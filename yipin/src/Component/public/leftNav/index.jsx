import React, {Component} from 'react';
import style from './leftNav.css'
import {item} from 'pubConf/Config.jsx'

export default class LeftNav extends Component {
    constructor(props) {
        super(props);
        this.state = {
            showIndex : this.props.showIndex,
            showChild : ""
        }
    }

     changeShow = (index,e) =>{
         e.stopPropagation();
        this.setState({
            showIndex:index,
            showChild : ""
        },()=>{
            this.props.history.push('/guide/'+item[index].link)
        })

    };

    changeChildShow = (ind,e) =>{
        e.stopPropagation();
        this.setState({
            showChild:ind
        },()=>{
            console.log(this.state)
        })

    };

    render() {
        let thiz = this;

        return (
            <li id="nav" className={style.box} style={{height:window.screen.height-80 + "px"}}>
                <ul className={style.navBox}>
                    {item.map(function(event,index){
                        return (
                        <li className={thiz.state.showIndex === index?style.navContentAct:style.navContent} onClick={thiz.changeShow.bind(thiz,event.index)} key={index}>
                            <img src={thiz.state.showIndex === index?event.imgAct:event.imgSrc}/>
                                {event.name}
                            <ul style={{background:"#ffffff"}}>
                                {event.child.map(function (childs,ind){
                                    return(
                                        <li className={thiz.state.showChild === ind?style.childAct:style.child} style={{display:thiz.state.showIndex === index?"block":"none"}} onClick={thiz.changeChildShow.bind(thiz,ind)} key={"child" + ind}>{childs}</li>
                                    )
                                })}
                            </ul>
                        </li>
                        )
                    })}
                </ul>
            </li>
        )
    }
}
