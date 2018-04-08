//Change(1st) by tzn on 2017/8/9. ==> 优化组件UI 与 使用方式

/*
 * 使用须知:
 * ***********************************************************************************
 *
 *   必传参数: handle  : function 组件的回调函数(向外传出包含年龄范围的数组,ckey)
 *            value   : array    组件渲染的薪水值(数组第一个为起始年龄,数组第二个为截止年龄)
 *            ckey    : string   key值
 *   选传参数: style   : object   支持自定义组件宽度,高度等属性
 *            placeholder    :  array   分别代表左右两下拉框的placeholder值
 *************** 组件左右两个下拉菜单样式会根据最外层容易宽度自动计算宽度 ********************
 *
 * */
import React from "react"

import style from './ageSelect.css';

import Select from 'pubCom/select/select.jsx';
import PropTypes from 'prop-types';


export default class AgeSelect extends React.Component {

    static propTypes = {
        handle:PropTypes.func.isRequired,
        value:PropTypes.array.isRequired,
        ckey:PropTypes.string.isRequired,
        placeholder:PropTypes.array,


    }
    static defaultProps ={
        width:'calc( 50% - 10px )',
    }

    constructor(props){

        super(props);

        let ctyle = props.style?{...props.style}:{};

        var age_from_list = [];

        for (var i = 16;i <= 50;i++){

            age_from_list.push(i)
        }
        let value = this.props.value||[]
        this.state = {

            style:ctyle,
            age_from:value[0] || "",
            age_to:value[1] || "",
            age_from_list:age_from_list
        }


    }

    componentWillReceiveProps(nextProps){

        var age_from = nextProps.value[0] || "";
        var age_to = nextProps.value[1] || "";

        this.setState({

            age_from:age_from,
            age_to:age_to
        })
    }

    calcAgeTo = (val)=>{

        var age_to = [];


        if (val == '' || val == undefined || val == null)

            return [];

        val = parseInt(val);

        for (var i = val+1;i <=100;i++){

            age_to.push(i);
        }

        return age_to;


    }


    handleCallback = (val,ckey)=>{

        var age = [];

        if (ckey == 'age_from'){

            age = [val,''];

        }else{

            age = [this.state.age_from,val];

        }


        if (this.props.handle)
            this.props.handle(age,this.props.ckey)

    }

    render(){
        const placeholder = this.props.placeholder?this.props.placeholder:[]

        var thiz = this;

        var age_to_list = this.calcAgeTo(this.state.age_from);
        const leftSelect ={
            width:this.props.width,

            height:this.state.style.height||'30px',
            float:'left',
            lineHeight:this.state.style.lineHeight||'30px'
        }
        const rightSelect={
            width:this.props.width,
            height:this.state.style.height,
            float:'right',
            lineHeight:this.state.style.lineHeight||'30px'
        }

        return(

            <div className={style.container} style={this.state.style}>

                <Select  handle={thiz.handleCallback}
                         style = {leftSelect}
                         value={this.state.age_from}
                         child={this.state.age_from_list}
                         ckey={'age_from'}
                         placeholder = {placeholder[0]}
                />

                <span className={style.join}> - </span>

                <Select  handle={thiz.handleCallback}
                         style = {rightSelect}
                         value={this.state.age_to}
                         child={age_to_list}
                         ckey={'age_to'}
                         placeholder = {placeholder[1]}/>
                <div className={style.clear}></div>
            </div>
        )

    }

}