
/*系统引导库*/

import React from 'react';

import Select from 'pubCom/select/select.jsx';

import style from './address.css';

import {getProArray,getCityArray,getAreaArray} from 'pubConf/Comstr.jsx';

import 'whatwg-fetch'

export default class Address extends React.Component {

    constructor(props){

        super(props);

        let ctyle = props.style?{...props.style}:{};
        let spaceCtyle = props.spaceStyle?{...props.spaceStyle}:{};
        var value = ['','',''];

        this.state = {

            style:ctyle,
            spaceStyle:spaceCtyle,
            globalcity:"",
            provinceList:[],
            currentProv:props.value[0] || value[0],
            cityList:[],
            currentCity:props.value[1] || value[1],
            areaList:[],
            currentArea:props.value[2] || value[2],
        }
    }


    componentWillReceiveProps(nextProps){

        var value = ['','',''];


        var _state = {
            currentProv:nextProps.value[0] || value[0],
            currentCity:nextProps.value[1] || value[1],
            currentArea:nextProps.value[2] || value[2],
        }

        this.setState(_state,()=>{
            this.initList()
        });


    }

    componentDidMount(){
        fetch("static_c/json/address.json")
            .then((res) => {return res.json(); })
            .then((data) => { this.setState({globalcity:data,provinceList:getProArray(data)})})
            .catch((e) => { console.log(e.message);});

    }
    initList = () =>{
        if(this.state.currentProv){
            var citylist = getCityArray(this.state.currentProv,this.state.globalcity);
            this.setState({
                cityList:citylist
            })

        }
        if(this.state.currentCity){
            var AreaList = getAreaArray(this.state.currentProv,this.state.currentCity,this.state.globalcity);
            this.setState({
                areaList:AreaList
            })
        }
    }
    handleCallback = (val,key)=>{

        var _state = {...this.state};

        if(key == 'currentProv'){

            var citylist = getCityArray(val,this.state.globalcity);

            var AreaList = getAreaArray(val,citylist[0],this.state.globalcity);
            this.setState({

                cityList:citylist,
                areaList:AreaList,
                currentProv:val,
                currentCity:citylist[0],
                currentArea:AreaList[0]
            })

            if (this.props.handle){

                this.props.handle([val,citylist[0],AreaList[0]],this.props.ckey)
            }

        }else if (key == 'currentCity'){


            var AreaList = getAreaArray(this.state.currentProv,val,this.state.globalcity);
            this.setState({

                areaList:AreaList,
                currentCity:val,
                currentArea:AreaList[0]
            })

            if (this.props.handle){

                this.props.handle([this.state.currentProv,val,AreaList[0]],this.props.ckey)
            }
        }else if (key == 'currentArea'){

            this.setState({

                currentArea:val
            })

            if (this.props.handle){

                this.props.handle([this.state.currentProv,this.state.currentCity,val],this.props.ckey)
            }
        }

    }

    render(){

        return (

            <div className={style.container}>

                <Select child={this.state.provinceList} value={this.state.currentProv} style={this.state.style} ckey="currentProv" handle={this.handleCallback}/>
                <span className={style.space} style={this.state.spaceStyle}></span>
                <Select child={this.state.cityList} value={this.state.currentCity} style={this.state.style} ckey="currentCity" handle={this.handleCallback}/>
                <span className={style.space} style={this.state.spaceStyle}></span>
                <Select child={this.state.areaList} value={this.state.currentArea} style={this.state.style} ckey="currentArea" handle={this.handleCallback}/>
            </div>

        )

    }

}
