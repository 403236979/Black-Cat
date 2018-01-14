import React, {Component} from 'react';
import style from './leftNav.css'
import {item} from 'pubConf/Config.jsx'

export default class LeftNav extends Component {
    constructor(props) {
        super(props);
        this.state = {
        }
    }

    render() {
        return (
            <li id="nav" className={style.box} style={{height:window.screen.height-80 + "px"}}>
                <ul className={style.navBox}>
                    {item.map(function(event,index){
                        return (
                        <li className={style.navContent} key={index}>
                            <img src={event.imgSrc}/>
                                {event.name}
                        </li>
                        )
                    })}
                </ul>
            </li>
        )
    }
}
