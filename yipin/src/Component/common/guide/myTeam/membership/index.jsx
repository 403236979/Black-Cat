import React, {Component} from 'react';
import style from './membership.css'
import { Link , withRouter } from 'react-router-dom'
import LeftNav from "pubCom/leftNav/index.jsx"
import GuideHeader from "pubCom/guideHeader/index.jsx"
import AccountList from "./accountList.jsx"


class Membership extends Component {
    constructor(props) {
        super(props);
        this.state = {
            showIndex:2,
            show:"all",
            dataList:[
                {
                    imgWap : '测',
                    name : '测试',
                    role : '管理员',
                    email : '403236979@qq.com',
                    show : 'admin',
                },
                {
                    imgWap : '实',
                    name : '实验',
                    role : '普通成员',
                    email : '445687959@qq.com',
                    show : 'all',
                },
                {
                    imgWap : '验',
                    name : '验实',
                    role : '普通成员',
                    email : '443268799@qq.com',
                    show : 'all',
                },

            ]
        }
    }

    changeShow = (type) =>{
        this.setState({
            show:type
        },()=>{
            console.log(this.state)
        })
    }


    render() {
        return (
            <div id='Test'>
                <GuideHeader/>
                <div className={style.box}>
                    <LeftNav {...this.props} {...this.state}/>
                    <div className={style.contentBox}>
                    <div style={{background: 'rgb(255, 255, 255)',minHeight:window.screen.height-125 + "px"}}>
                        <div className={style.top}>
                            <div className={this.state.show==='all'?style.btnClick:style.btn} onClick={this.changeShow.bind(this,'all')}>所有成员</div>
                            <div className={this.state.show==='admin'?style.btnClick:style.btn} onClick={this.changeShow.bind(this,'admin')}>管理员</div>
                            <div className={style.tip}>
                                有0条待审核的加入申请,
                                <Link to="/guide/myTeam/applyMembers">去处理</Link>
                            </div>
                            <div  className={style.link}>
                                <Link to="/guide/myTeam/AddAccount">邀请新成员</Link>
                            </div>
                            <div  className={style.link}>
                                <Link to="/login">创建／切换团队</Link>
                            </div>
                        </div>
                        <div>
                            <AccountList show={this.state.show} dataList={this.state.dataList}/>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        )
    }
}
export default withRouter(Membership);
