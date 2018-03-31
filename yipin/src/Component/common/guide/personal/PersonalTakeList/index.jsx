import React, {Component} from 'react';
import style from './personalTakeList.css'
import { Link , withRouter } from 'react-router-dom'
import LeftNav from "pubCom/leftNav/index.jsx"
import GuideHeader from "pubCom/guideHeader/index.jsx"
import Pagination from 'pubCom/pagination/pagination.jsx';
import TabsControl from 'pubCom/tabControl/tabControl.jsx'
import Table from 'pubCom/table/table.jsx'



class PersonalTakeList extends Component {
    constructor(props) {
        super(props);
        this.state = {
            data1:[],
            data2:[],
            data3:[],
            page:1,
            maxpage:1,
            pageData2:1,
            maxpageData2:1,
            username:"",
            userphone:"",
            useremail:"",
            userjob:"",
            userlogo:''
        }
    }

    // details_num_day: 0
    // details_num_month: 0
    // details_num_total: 0
    // details_num_week: 0
    // download_num_day: 0
    // download_num_month: 0
    // download_num_total: 0
    // download_num_week: 0
    // entry_num_day: 0
    // entry_num_month: 0
    // entry_num_total: 0
    // entry_num_week: 0
    // interview_num_day: 0
    // interview_num_month: 0
    // interview_num_total: 0
    // interview_num_week: 0
    // offer_num_day: 0
    // offer_num_month: 0
    // offer_num_total: 0
    // offer_num_week: 0
    // recommend_num_day: 0
    // recommend_num_month: 0
    // recommend_num_total: 0
    // recommend_num_week: 0
    // search_num_day: 0
    // search_num_month: 9
    // search_num_total: 9
    // search_num_week: 3
    // sms_num_day: 0
    // sms_num_month: 0
    // sms_num_total: 0
    // sms_num_week: 0
    // wish_num_day: 0
    // wish_num_month: 0
    // wish_num_total: 0
    // wish_num_week: 0

    change = () => {
        this.props.history.push('/guide/personal/personalEdit')
    }

    lineClick = () =>{
        console.log('click')
    }

    render() {
        let thiz = this;
        const columns = [
            {
                title:"客户公司",
                key:"company_name"
            },
            {
                title:"保障职位",
                key:"job_name"
            },
            {
                title:"交付日期剩余",
                key:"start_time"
            },
            {
                title:"需求人数",
                key:"total_num"
            },
            {
                title:"剩余需求人数",
                key:"rest_num",
            },
            {
                title:"我完成了",
                key:"finish_by_me"
            }
        ];

        const columns2 = [
            {
                title:"",
                key:"name"
            },
            {
                title:"本日",
                key:"day"
            },
            {
                title:"本周",
                key:"week"
            },
            {
                title:"本月",
                key:"moth"
            },
            {
                title:"总计",
                key:"all_num"
            }
        ];

        const data1 = this.state.data1;
        const data2 = this.state.data2;
        const data3 = this.state.data3;

        return (
            <div>
                <GuideHeader/>
                <div className={style.box}>
                    <LeftNav {...this.props} {...this.state}/>
                    <div className={style.rightSide}>
                        <div className={style.topSide}>
                            <div style={{float: 'left'}}>
                                <div className={style.portrait}>
                                    <span>测</span>
                                </div>
                                <div className={style.panel}>
                                    <p>
                                        <span className={style.name}>测试</span>
                                        <span className={style.tip}>管理员</span>
                                    </p>
                                    <p className={style.userCall}>403236979@qq.com</p>
                                    <p className={style.userCall} style={{marginTop:'12px'}}>
                                        17826829331
                                        <span  className={style.btn} onClick={this.change.bind(this)}>编辑个人信息</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div className={style.downSide}>
                            <TabsControl style = {{height:'45px',titleWidth:'130px'}}>
                                <div name="进展中的任务">
                                    <Table columns = {columns}
                                           source = {data1}
                                           lineClick = {this.lineClick}
                                    >
                                    </Table>
                                    <div className={(this.state.maxpage == 1)?style.hidePageControlWrap:style.pageControlWrap}>
                                        <Pagination  nCurrentPage={this.state.page} nMaxPage={this.state.maxpage} fPageHandle={this.pagnationCallback}/>
                                    </div>
                                </div>
                                <div name="完成的任务">
                                    <Table columns = {columns}
                                           source = {data2}
                                           lineClick = {this.lineClick}
                                    >
                                    </Table>
                                    <div className={(this.state.maxpageData2 == 1)?style.hidePageControlWrap:style.pageControlWrap}>
                                        <Pagination  nCurrentPage={this.state.pageData2} nMaxPage={this.state.maxpageData2} fPageHandle={this.pagnationCallbackData2}/>
                                    </div>
                                </div>
                                <div name="我的达成">
                                    <Table columns = {columns2}
                                           source = {data3}
                                    >
                                    </Table>
                                </div>

                            </TabsControl>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
export default withRouter(PersonalTakeList);
