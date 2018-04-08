

/*
* 参数:
*
*
*
* */


import React from "react"

import style from './checkBoxGroup.css';

export default class CheckBoxGroup extends React.Component {

    constructor(props){

        super(props);

    }

    componentWillReceiveProps(nextProps){


    }


    changeBox = (index,e)=>{

        if (this.props.handle){

            this.props.handle(e.target.checked,this.props.para[index].ckey)
        }
    }

    render(){

        var thiz = this;

        return(

            <div className={style.container}>


                {

                    this.props.para.map(function(item,index){

                        return (
                            <div className={style.itemCon} key={'checkboxgroup'+index}>
                                <input type={thiz.props.ctype} name='abc' checked={item.value}
                                       className={style.itemCheckbox} onChange={thiz.changeBox.bind(thiz,index)}/>
                                <span>{item.title}</span>
                            </div>
                        )
                    })

                }
            </div>
        )

    }

}