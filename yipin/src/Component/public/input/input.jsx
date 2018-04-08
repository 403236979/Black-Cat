/*
 * Created by xkj on 2017/6/1.
 * Change(1st) by tzn on 2017/7/4. ==> 1.新增焦点事件
 *                                     2.优化组件UI 新增组件焦点状态UI
 */

/*
* 参数说明  1、style的所有参数（可选）
*         2、placeholder
*         3、value(可选)
*         4、handle：回调函数(可选)
*         5、ckey:必填 input组件的标示
*         6.    Blur(失去焦点事件):可选
*         7.    Focus(获取焦点事件):可选
* */


import React from "react"

import style from './input.css'


export default class Input extends React.Component {



        constructor(props){

            super(props);

            let ctyle = props.style?{...props.style}:{};
            let disabled = props.disabled?true:false;
            this.state = {
                disabled:disabled,
                _style:ctyle,
                placeholder:props.placeholder || "",
                value:props.value || "",
                containerStatus:'normal',
            }
        }

        componentWillReceiveProps(nextProps){

           let value = nextProps.value||'';
           let ctyle = nextProps.style;

           this.setState({
               value:value,
               _style:ctyle,
           })
        }

        setChange = (e)=>{

            e.stopPropagation();

            if (this.props.handle)
                this.props.handle(e.target.value,this.props.ckey)
        }

        getIconShow = ()=>{

            if (this.props.prev)

                return {display:'inline-block'}

            return {};
        }

        Blur=(e)=>{
            this.setState({
                containerStatus:'normal',
            })
            if (this.props.Blur){
                this.props.Blur(e.target.value,this.props.ckey)
            }

        }
        Focus = (e)=>{
            this.setState({
                containerStatus:'focus',
            })
            if (this.props.Focus){
                this.props.Focus(e.target.value,this.props.ckey)
            }
        }



        render(){
            const {_style,placeholder,disabled,value,containerStatus} =this.state
            return (

                <div className={containerStatus=='normal'?style.container:style.containerFocus} style={_style}>

                    <input  className={disabled?style.inputClDisabled:style.inputCl}
                            placeholder={placeholder}
                            style={this.props.prev?{textIndent:'30px'}:{}}

                           value={value} onChange={this.setChange.bind(this)} disabled={disabled}
                           onBlur={this.Blur}
                           onFocus={this.Focus}
                            type={this.props.ctype || "text"}
                    />
                    {/*<img src={require('./img/search.png')} style={this.getIconShow()} className={style.searchIcon}/>*/}
                </div>

            )
        }

}