import React, {Component} from 'react';
import style from './applyMembers.css'
import { Link , withRouter } from 'react-router-dom'
import LeftNav from "pubCom/leftNav/index.jsx"
import GuideHeader from "pubCom/guideHeader/index.jsx"


class ApplyMembers extends Component {
    constructor(props) {
        super(props);
        this.state = {
            showIndex:2,
            dataList:[
                {
                    imgWap : '实',
                    name : '实验',
                    email : '4456873259@qq.com',
                    phone :'17826829330',
                    show : 'all',
                },
                {
                    imgWap : '验',
                    name : '验实',
                    email : '443268329@qq.com',
                    phone :'17826829331',
                    show : 'all',
                }
                ]
        }
    }

    render() {
        let thiz = this
        return (
            <div id='Test'>
                <GuideHeader/>
                <div className={style.box}>
                    <LeftNav {...this.props} {...this.state}/>
                    <div className={style.contentBox}>
                        <div style={{background: 'rgb(255, 255, 255)'}}>
                            <div className={style.tabTitle}>
                                申请加入
                            </div>
                            {thiz.state.dataList.map(function(item,index){
                                return(
                                    <div className={style.info} key={index}>
                                        <div className={style.infoLeft}>
                                            <div className={style.imgWap}>
                                                <span>{item.imgWap}</span>
                                            </div>
                                            <div className={style.nameWap}>
                                                <div className={style.firstLine}>
                                                    <span className={style.name}>{item.name}</span>
                                                </div>
                                                <div className={style.endLine}>
                                                    <span>{item.email}</span>
                                                    <span>{item.phone}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div className={style.infoRight}>
                                            <div className={style.lastDiv}>
                                                <div className={style.rightDiv}>
                                                    <div className={style.modAccountConfirm} >
                                                        同意
                                                    </div>
                                                    <div className={style.modAccountConfirm} >
                                                        拒绝
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                )
                            })
                            }
                        </div>
                        </div>
                    </div>
                </div>
        )
    }
}
export default withRouter(ApplyMembers);
