
import React from "react"

import style from './select.css';


export default class Select extends React.Component {

    constructor(props){

       super(props);

        let ctyle = props.style?{...props.style}:{};

       this.state = {

           style:ctyle,
           value:this.props.value || "",
           childShow:false,
           containerStatus:'normal',
           placeholder:this.props.placeholder || "",
       }

    }

    componentWillReceiveProps(nextProps){

        let value = nextProps.value||'';
        let ctyle = nextProps.style;

        this.setState({
            value:value,
            style:ctyle,
        })
    }

    getChild = ()=>{

        let thiz = this

        if (!this.props.child && !this.props.ctype)
            return;

        if (this.props.ctype == 'location'){
            {/*<Location handle={thiz.handleLocation} ckey="location"/>*/}
            return ;

        }else if (this.props.ctype == 'time'){


        }
        else{
            return (

                <ul className={this.props.child.length?style.childCl:style.childClNone}>
                    {
                        this.props.child.map(function (item, index){
                            if(item.toString().indexOf('~')<0){
                              return <li key={"pubsel"+index} className={style.itemLi} onClick={thiz.selectItem.bind(thiz,item)}>{item}</li>
                            }else{
                              return <li key={"pubsel"+index} className={style.itemLi} onClick={thiz.selectItem.bind(thiz,item)}>{item.toString().substring(0,item.toString().indexOf('~'))}</li>

                            }
                        })
                    }

                </ul>
            )
        }
    }

    getChildShow = () =>{
        if(this.state.childShow){
            return {display:"block"}
        }
    }

    selectItem = (item,e) =>{
        if (this.props.handle){

            this.props.handle(item,this.props.ckey)
            this.setState({
                childShow:false,
                containerStatus:'normal'
            })
        }

    }

    selectChild= () =>{
        this.setState({
            childShow:!this.state.childShow
        })
    }

    Focus = (e) =>{
        this.setState({
            containerStatus:'focus'
        })
        e.stopPropagation()
        if (this.props.Focus)
            this.props.Focus()

    }
    Blur =(e)=>{
            this.setState({
                childShow:false,
                containerStatus:'normal'
            })
            if (this.props.Blur)
                this.props.Blur()
    }
    render(){
        const{containerStatus}=this.state;
        return(


            <div className={containerStatus=='normal'?style.container:style.containerFocus}
                 style={this.state.style} tabIndex='0'
                 onFocus={this.Focus}
                 onBlur={this.Blur}
            >

                <div className={style.contentCl}
                        onClick={this.selectChild.bind(this)}>
                    <span style={{marginLeft:"-6px"}} className={this.props.value?{}:style.place}>{this.state.value||this.state.placeholder}</span>
                    <img src={require('./img/down.png')} className={style.downIcon}/>

                    <div className={style.childCon} style={this.getChildShow()}>
                    {
                        this.getChild()

                    }
                    </div>

                </div>
            </div>
        )

    }

}