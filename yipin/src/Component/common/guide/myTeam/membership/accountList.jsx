import React, {Component} from 'react';
import style from './membership.css'
import { Link , withRouter } from 'react-router-dom'
import ModAccount from './modAccount.jsx'


class AccountList extends Component {
    constructor(props) {
        super(props);
        this.state = {
            item: [],
            show:this.props.show
        }

    }

    Change = (e) =>{
            e.target.parentNode.setAttribute('style', 'display: none');
    }

    ChangeConfirm = (type,e) =>{
        if(type==='sure'){
            e.target.parentNode.parentNode.previousSibling.setAttribute('style', 'display: display');
        }else{
            e.target.parentNode.parentNode.previousSibling.setAttribute('style', 'display: display');
        }
    }

    render() {
        let thiz=this
        return (
            <div>
                {thiz.props.dataList.map(function(item,index){
                    return(
                        <div style={thiz.props.show===item.show || item.show==='admin'?{'display':"block"}:{"display":"none"}} className={style.info} key={index}>
                            <div className={style.infoLeft}>
                                <div className={style.imgWap}>
                                    <span>{item.imgWap}</span>
                                </div>
                                <div className={style.nameWap}>
                                    <div className={style.firstLine}>
                                        <span className={style.name}>{item.name}</span>
                                        <span className={style.role}>{item.role}</span>
                                    </div>
                                    <div className={style.endLine}>
                                        <span>{item.email}</span>
                                    </div>
                                </div>
                            </div>
                            <div className={style.infoRight}>
                                {
                                    item.role==="管理员"?<div> </div>
                                        :
                                        <div>
                                            <div className={style.firstDiv} onClick={thiz.Change.bind(this)}>
                                                <span className={style.change}>修改角色</span>
                                            </div>
                                            <div className={style.lastDiv}>
                                                <ModAccount />
                                                <div className={style.rightDiv}>
                                                    <div className={style.modAccountConfirm} onClick={thiz.ChangeConfirm.bind(this,"sure")}>
                                                        保存设置
                                                    </div>
                                                    <div className={style.modAccountConfirm} onClick={thiz.ChangeConfirm.bind(this,"no")}>
                                                        取消
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                }
                            </div>
                        </div>
                    )
                })
                }
            </div>
        )
    }
}
export default withRouter(AccountList);
