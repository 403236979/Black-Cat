import React, {Component} from 'react';
import style from './changeTeam.css'
import { Link , withRouter } from 'react-router-dom'
import GuideHeader from "pubCom/guideHeader/index.jsx"
import OutBtn from "./OutBtn.jsx"


class ChangeTeam extends Component {
    constructor(props) {
        super(props);
        this.state = {
            showIndex:0,
            show:false,
            dataList:[
                {
                    name:"第一个团队"
                },
                {
                    name:"第二个团队"
                }
            ]
        }
    }

    show = ()=>{
        this.setState({
            show:!this.state.show
        })
    }

    render() {
        let thiz=this
        return (
            <div id='Test'>
                <GuideHeader/>
                <div className={style.middle}>
                    <div className={style.setGroup}>
                        <p style={thiz.state.show?{display:'none'}:{display:'block'}} onClick={thiz.show.bind(this)}>
                            <span>+</span>
                            创建团队
                        </p>
                        <div className={style.isOperating} style={thiz.state.show?{display:'block'}:{display:'none'}}>
                            <p>+创建新团队</p>
                            <div className={style.inputContainer}>
                                <input type="text" className={style.inputCl} placeholder="新团队名称"  value=""/>
                            </div>
                            <p>一个团队由多个角色的用户组成，有利于通过每一个成员的知识和技能协同工作，解决问题，达到共同的目标。</p>
                            <div>
                                <span onClick={thiz.show.bind(this)}>取消</span>
                                <span onClick={thiz.show.bind(this)}>创建团队</span>
                            </div>
                        </div>
                    </div>
                    {thiz.state.dataList.map(function (item,index) {
                        return(
                            <div className={style.selectGroup} key={index}>
                                <div className={style.group}>
                                    <p style={{color:'rgba(0,0,0,.54)'}}>
                                        <Link to="/guide">{item.name}</Link>
                                    </p>
                                    <OutBtn/>
                                </div>
                            </div>
                        )
                    })}
                </div>
            </div>
        )
    }
}
export default withRouter(ChangeTeam);
