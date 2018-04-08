import React, {Component} from 'react';
import style from './Step3.css'
import { Link , withRouter } from 'react-router-dom'
import LeftNav from "pubCom/leftNav/index.jsx"
import GuideHeader from "pubCom/guideHeader/index.jsx"


class Step3 extends Component {
    constructor(props) {
        super(props);
        this.state={


            hr:[

                [{title:"联系人: ",value:""},{title:"职位: ",value:""}],
                [{title:"手机: ",value:""},{title:"邮箱:",value:""}]
            ],

            job:[

                [{title:"招聘职位:",value:""},{title:"工作性质:",value:""}],

                [{title:"性别要求:",value:""},{title:"职位类别:",value:""}],

                [{title:"年龄:",value:""+"-"+""+"岁"},{title:"需求人数:",value:""+"人"}],

                [{title:"学历要求:",value:""},{title:"专业要求:",value:""}],

                [{title:"院校要求:",value:""},{title:"工作年限:",value:""}],

                [{title:"工作背景:",value:""},{title:"薪资要求:",value:""+"-"+""}],

                [{title:"语言要求:",value:""},{title:"工作地点:",value:""+'-'+""+'-'+""}],

                [{title:"其他需求:",value:""},{title:"详细地址:",value:""}],
            ],

            task_type:[{

                title:"到面",
                desc1:"项目完成需完成一定数量的",
                desc2:"到面",
                type:"到面保",
                value:true

            },
                {

                    title:"入职",
                    desc1:"项目完成需完成一定数量的",
                    desc2:"入职",
                    type:"入职保",
                    value:false

                },{

                    title:"意向简历",
                    desc1:"项目完成需完成一定数量的",
                    desc2:"直约",
                    type:"直约保",
                    value:false

                }],

            company_info:[

                [
                    {title:"公司名称: ",value:""},{title:"公司简称: ",value:""}
                ],
                [
                    {title:"所属行业: ",value:""},{title:"公司性质: ",value:""}
                ],
                [
                    {title:"公司规模: ",value:""},{title:"公司地址: ",value:""}
                ],
            ],

            company_logo:"",
            company_introduce:"",
            company_welfare:['五险一金','年底双薪','文艺办公室'],
            company_env:[],
            showIndex:0


        }
    }


    nextClick = (e)=>{

        e.stopPropagation();


        this.props.history.push('/guide/taskManagement/taskKanban')

    }

    render() {
        return (
            <div id='Test'>
                <GuideHeader/>
                <div className={style.box}>
                    <LeftNav {...this.props} {...this.state}/>
                    <div className={style.contentBox}>
                        <div className={style.bar}>
                            <p>填写联系人信息<b></b></p>
                            <p>填写职位需求<b></b></p>
                            <p style={{color: 'rgb(15, 157, 88)',fontWeight: 'bold'}}>
                                确认发布
                                <b></b>
                            </p>
                            <div className={style.barSolid}/>
                        </div>
                        <div style={{background: 'rgb(255, 255, 255)'}}>
                            <div className={style.thirdConPad}>

                                <div className={style.secondPostHead}>

                                    确认发布
                                </div>

                                <div className={style.thirdCompanyInfoDiv}>

                                    <h1 className={style.thirdTaskTypeList}>企业信息</h1>

                                    <div className={style.thirdLine}>

                                        <span>公司logo：</span>
                                        <img style={this.state.company_logo?{}:{display:"none"}} src={this.state.company_logo}/>
                                    </div>

                                    {

                                        this.state.company_info.map(function(info_item,index){

                                            var ret = [];

                                            ret = info_item.map(function(item,ind){

                                                return (
                                                    <div className={style.thirdHalfLine} key={'company_info'+ind}>
                                                        <span>{item.title}</span>
                                                        <span>{item.value}</span>
                                                    </div>
                                                )
                                            })

                                            return <div className={style.thirdLine} key={'company_info2'+index}>{ret}</div>

                                        })

                                    }

                                    <div className={style.thirdLine}>

                                        <span>公司介绍：</span>
                                        <span>{this.state.company_introduce}</span>
                                    </div>


                                    <div className={style.thirdLine}>

                                        <span>公司福利：</span>
                                        {
                                            this.state.company_welfare.map(function(wel,index){

                                                return (

                                                    <div className={style.welfareSpan} key={"company_welfare"+index}>
                                                        {wel}
                                                    </div>
                                                )

                                            })

                                        }
                                    </div>

                                    <div className={style.thirdLine}>

                                        <span>公司环境：</span>
                                        {

                                            this.state.company_env.map(function(env,index){
                                                return (

                                                    <div className={style.envDiv} key={'env'+index}>
                                                        <img src={env}/>
                                                    </div>
                                                )

                                            })

                                        }
                                    </div>

                                </div>

                                <div className={style.thirdHrInfoDiv}>

                                    <h1 className={style.thirdTaskTypeTitle}>联系人信息</h1>

                                    {

                                        this.state.hr.map(function(hr_item,index){

                                            var ret = [];

                                            ret = hr_item.map(function(item,ind){

                                                return (
                                                    <div className={style.thirdHalfLine} key={'hr2'+ind}>
                                                        <span>{item.title}</span>
                                                        <span>{item.value}</span>
                                                    </div>
                                                )
                                            })

                                            return <div className={style.thirdLine} key={'hr1'+index}>{ret}</div>

                                        })

                                    }

                                </div>

                                <div className={style.thirdHrInfoDiv}>

                                    <h1 className={style.thirdTaskTypeTitle}>职位信息</h1>

                                    {

                                        this.state.job.map(function(job_item,index){

                                            var ret = [];
                                            ret = job_item.map(function(item,ind){

                                                return (
                                                    <div className={style.thirdHalfLine} key={'job'+ind}>
                                                        <span>{item.title}</span>
                                                        <span className={item.title=="其他需求:"?style.thirdSpan:""} >{item.value}</span>
                                                    </div>
                                                )
                                            })

                                            return <div className={style.thirdLine} key={'job2'+index}>{ret}</div>

                                        })

                                    }

                                    <div className={style.thirdLine}>

                                        <span style={{marginRight:"10px"}}>职位简介:</span>
                                        <span className={style.thirdLine} style={{wordWrap: 'break-word'}}>
                                            {/*{this.props.job_detail.detail}*/}
                                            </span>

                                    </div>

                                </div>

                            </div>
                            <div className={style.firtConBtnDiv}>

                                <input value="下一页" className={style.submitBtn} type="button" onClick={this.nextClick.bind(this)}/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
export default withRouter(Step3);
