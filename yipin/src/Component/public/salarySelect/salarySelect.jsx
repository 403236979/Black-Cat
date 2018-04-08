//Change(1st) by tzn on 2017/8/9. ==> 优化组件UI 与 使用方式

/*
* 使用须知:
* ***********************************************************************************
*
*   必传参数: handle  : func 组件的回调函数(向外传出包含薪水范围的数组,ckey)
*            value   : array    组件渲染的薪水值(数组第一个为起始薪水,数组第二个为截止薪水)
*            ckey    : string   key值
*   选传参数: style   : object   支持自定义组件宽度,高度等属性
*            placeholder    :  array   分别代表左右两下拉框的placeholder值
*************** 组件左右两个下拉菜单样式会根据最外层容易宽度自动计算宽度 ********************
*
* */


import React from "react"

import style from './salarySelect.css';

import Select from 'pubCom/select/select.jsx';
import PropTypes from 'prop-types';


export default class SalarySelect extends React.Component {
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

        var salary_from_list = [];

        for (var i = 1;i <= 50;i++){

            salary_from_list.push(i+'k')
        }

        for (var i = 60;i <= 70;i=i+10){

            salary_from_list.push(i+'k')

        }
        let value = this.props.value||[]
        this.state = {

            style:ctyle,
            salary_from:value[0] || "",
            salary_to:value[1] || "",
            salary_from_list:salary_from_list
        }


    }

    componentWillReceiveProps(nextProps){

        var salary_from = nextProps.value[0] || "";
        var salary_to = nextProps.value[1] || "";

        this.setState({

            salary_from:salary_from,
            salary_to:salary_to
        })
    }

    calcSalaryTo = (val)=>{

        var salary_to = [];


        if (val == '' || val == undefined || val == null)
            return [];

        val = parseInt(val.replace('k',''));



        if (0< val <= 70){


            for (var i = val+1;i <=100;i++){

                salary_to.push(i+'k');
            }

            return salary_to;
        }
    }


    handleCallback = (val,ckey)=>{

        var salary = [];

        if (ckey == 'salary_from'){

            salary = [val,''];

        }else{

            salary = [this.state.salary_from,val];

        }

        if (this.props.handle)
            this.props.handle(salary,this.props.ckey)

    }

    render(){
        const placeholder = this.props.placeholder?this.props.placeholder:[]

        const leftSelect ={
            width:this.props.width,
            height:this.state.style.height||'30px',
            float:'left',
            lineHeight:this.state.style.lineHeight||'30px'
        }
        const rightSelect={
            width:this.props.width,
            //width:'-moz-calc( 50% - 10px ) ',
            //width:'-webkit-calc( 50% - 10px )',
            height:this.state.style.height,
            float:'right',
            lineHeight:this.state.style.lineHeight||'30px'
        }
        var thiz = this;

        var salary_to_list = this.calcSalaryTo(this.state.salary_from);

        return(

            <div className={style.container} style={this.state.style}>

                <Select  handle={thiz.handleCallback}
                         style={leftSelect}
                         value={this.state.salary_from}
                         child={this.state.salary_from_list}
                         placeholder = {placeholder[0]}
                         ckey={'salary_from'}

                />

                <span className={style.join}> - </span>

                <Select  handle={thiz.handleCallback}
                         style={rightSelect}
                         placeholder = {placeholder[1]}

                         value={this.state.salary_to}
                         child={salary_to_list} ckey={'salary_to'}/>
                <div className={style.clear}></div>
            </div>
        )

    }

}