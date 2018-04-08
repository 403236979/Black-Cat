import React, {Component} from 'react';
import style from './Step2.css'
import { Link , withRouter } from 'react-router-dom'
import LeftNav from "pubCom/leftNav/index.jsx"
import GuideHeader from "pubCom/guideHeader/index.jsx"
import Input from "pubCom/input/input.jsx"
import Select from 'pubCom/select/select.jsx';
import AgeSelect from 'pubCom/ageSelect/ageSelect.jsx';
import CheckBoxGroup from 'pubCom/checkBoxGroup/checkBoxGroup.jsx';
import SalarySelect from 'pubCom/salarySelect/salarySelect.jsx';
import Address from 'pubCom/address/address.jsx';
import {checkTelePhone } from 'pubConf/Comstr.jsx';
import {trade,degree_list,work_year,language_list} from 'pubConf/Config.jsx'


class Step2 extends Component {
    constructor(props) {
        super(props);
        this.state = {
            showIndex:0,

            position:{value:"",err:"",temp_err:"请输入职位名称"},
            num:{value:"",err:"",temp_err:"请输入需求人数"},
            trade:{value:"",err:"",temp_err:"请选择所在行业"},
            address:{province:"",city:"",area:"",err:""},
            work_back:[{title:"名企",ckey:"company",value:false},{title:"BAT",ckey:"bat",value:false},{title:"海外工作经历",ckey:"exp",value:false}],
            detailAddress:{value:"",err:"",temp_err:"请输入详细地址"},
            type:{value:"",err:"",temp_err:"请选择工作性质"},
            salary:{value:["",""]},
            description:{value:"",err:"",temp_err:"请输入职位简介"},
            degree:{value:"",err:"",temp_err:"请选择学历"},
            major:{value:""},
            school_level:[{title:"统招",ckey:"union",value:false},{title:"985/211",ckey:"9821",value:false},{title:"海外教育",ckey:"foregin",value:false}],
            schoolleveldetail:{value:""},
            work_year:{value:"",err:"",temp_err:"请选择工作年限"},
            male:{value:''},
            age:{value:["",""]},
            language:{value:''},
            other:{value:''}
        }
    }

    autoHideAddress = (val) => {
        if (val && val.length > 5) {
            return val.slice(0, 4) + '...'
        } else {
            return val
        }
    }

    handleSchoolLevel = (val,key)=>{


        var _state = {...this.state};

        for (var i = 0;i < _state.school_level.length;i++){

            if (key == _state.school_level[i].ckey){

                _state.school_level[i].value = val;
                break;
            }
        }

        this.setState(_state);
    }

    handleWorkBack = (val,key)=>{

        var _state = {...this.state};

        for (var i = 0;i < _state.work_back.length;i++){

            if (key == _state.work_back[i].ckey){

                _state.work_back[i].value = val;
                break;
            }
        }

        this.setState(_state);
    }

    getErrShow = (key)=>{

        if (this.state[key].err){

            return {display:'block'}
        }

        return {display:'none'}
    }

    nextClick = (e)=>{

        e.stopPropagation();


        this.props.history.push('/guide/taskManagement/taskKanban')

    }

    handleTextArea = (key,e)=>{

        e.stopPropagation();

        var _state = {...this.state};

        _state[key].value = e.target.value;
        _state[key].err = "";


        this.setState(_state);
    }

    handleValue = (val,key)=>{

        var _state = {...this.state};

        _state[key].value = val;
        _state[key].err = "";

        this.setState(_state,()=>{
            console.log(this.state)
        });
    }

    render() {
        var thiz = this;

        var ctyle={borderRadius:"2px", width:"325px", height:"36px", lineHeight:"36px", border:"1px solid rgba(0,0,0,0.12)", backgroundColor:"#ffffff", textIndent:"20px"};

        var addressStyle = {width:"100px",height:"36px",lineHeight:"36px",border:"1px solid rgba(0,0,0,0.12)",backgroundColor:"#ffffff"};

        var salaryStyle = {width:"325px",height:"36px",lineHeight:"36px",backgroundColor:"#ffffff"};

        return (
            <div id='Test'>
                <GuideHeader/>
                <div className={style.box}>
                    <LeftNav {...this.props} {...this.state}/>
                    <div className={style.contentBox}>
                        <div className={style.bar}>
                            <p>填写联系人信息<b></b></p>
                            <p style={{color: 'rgb(15, 157, 88)',fontWeight: 'bold'}}>填写职位需求<b></b></p>
                            <p>确认发布<b></b></p>
                            <div className={style.barSolid}/>
                        </div>
                        <div style={{background: 'rgb(255, 255, 255)'}}>
                            <div className={style.conLeft}>
                                <div className={style.header}>
                                    <span className={style.headerTitle}>填写职位需求</span>
                                </div>
                                <div className={style.secondPostItemHead}>
                                    职位需求
                                </div>

                                <div className={style.postItem}>
                                    <div className={style.titleCon}>
                                        <span>招聘职位<span style={{'color':'red'}}>*</span>:</span>

                                    </div>
                                    <div className={style.contentCon}>
                                        <Input value={thiz.state.position.value} ckey='position' style={ctyle} handle={thiz.handleValue}/>
                                        <p className={style.errMs} style={thiz.getErrShow('position')}>{thiz.state.position.err}</p>
                                    </div>

                                </div>

                                <div className={style.postItem}>
                                    <div className={style.titleCon}>
                                        <span>需求人数<span style={{'color':'red'}}>*</span>:</span>

                                    </div>
                                    <div className={style.contentCon}>
                                        <Input value={thiz.state.num.value} ckey='num' style={ctyle} handle={thiz.handleValue}/>
                                        <p className={style.errMs} style={thiz.getErrShow('num')}>{thiz.state.num.err}</p>
                                    </div>

                                </div>


                                <div className={style.postItem}>
                                    <div className={style.titleCon}>
                                        <span>所在行业<span style={{'color':'red'}}>*</span>:</span>

                                    </div>
                                    <div className={style.contentCon}>
                                        <Select child={trade}
                                                value={thiz.state.trade.value} ckey='trade' style={ctyle} handle={thiz.handleValue}/>
                                        <p className={style.errMs} style={thiz.getErrShow('trade')}>{thiz.state.trade.err}</p>
                                    </div>

                                </div>

                                {/*<div className={style.postItem}>*/}

                                    {/*<div className={style.titleCon}>*/}
                                        {/*<span>工作地点<span style={{'color':'red'}}>*</span>:</span>*/}

                                    {/*</div>*/}
                                    {/*<div className={style.contentCon}>*/}
                                        {/*<Address style={addressStyle}*/}
                                                 {/*value={[thiz.state.address.province,this.autoHideAddress(thiz.state.address.city),this.autoHideAddress(thiz.state.address.area)]} ckey="address" handle={this.handleAddress}/>*/}
                                        {/*<p className={style.errMs} style={thiz.getErrShow('address')}>{thiz.state.address.err}</p>*/}
                                    {/*</div>*/}

                                {/*</div>*/}


                                <div className={style.postItem}>

                                    <div className={style.titleCon}>
                                        <span>详细地址<span style={{'color':'red'}}>*</span>:</span>
                                    </div>
                                    <div className={style.contentCon}>
                                        <Input value={thiz.state.detailAddress.value} ckey = "detailAddress" style={ctyle} handle={thiz.handleValue}/>
                                        <p className={style.errMs} style={thiz.getErrShow('detailAddress')}>{thiz.state.detailAddress.err}</p>
                                    </div>
                                </div>

                                <div className={style.postItem}>
                                    <div className={style.titleCon}>
                                        <span>工作性质<span style={{'color':'red'}}>*</span>:</span>

                                    </div>
                                    <div className={style.contentCon}>
                                        <Select child={['全职','兼职','实习']}
                                                value={thiz.state.type.value} ckey='type' style={ctyle} handle={thiz.handleValue}/>
                                        <p className={style.errMs} style={thiz.getErrShow('type')}>{thiz.state.type.err}</p>
                                    </div>

                                </div>


                                <div className={style.postItem}>

                                    <div className={style.titleCon}>
                                        <span>薪资待遇<span style={{'color':'red'}}>*</span>:</span>
                                    </div>
                                    <div className={style.contentCon}>
                                        <SalarySelect
                                            value={thiz.state.salary.value} ckey = "salary" style={salaryStyle} handle={thiz.handleValue}/>
                                        <p className={style.errMs} style={thiz.getErrShow('salary')}>{thiz.state.salary.err}</p>
                                    </div>
                                </div>


                                <div className={style.postItem}>

                                    <div className={style.titleCon} style={{verticalAlign:"top"}}>
                                        <span>职位简介<span style={{'color':'red'}}>*</span>:</span>
                                    </div>
                                    <div className={style.contentCon}>
                       <textarea value={this.state.description.value} onChange={thiz.handleTextArea.bind(thiz,"description")}
                                 className={style.posDescript} ></textarea>
                                        <p className={style.errMs} style={thiz.getErrShow('description')}>{thiz.state.description.err}</p>
                                    </div>

                                </div>
                                <div className={style.secondPostItemHead}>
                                    教育需求
                                </div>

                                <div className={style.postItem}>
                                    <div className={style.titleCon}>
                                        <span>学历<span style={{'color':'red'}}>*</span>:</span>

                                    </div>
                                    <div className={style.contentCon}>
                                        <Select child={degree_list}
                                                value={thiz.state.degree.value} ckey='degree' style={ctyle} handle={thiz.handleValue}/>
                                        <p className={style.errMs} style={thiz.getErrShow('degree')}>{thiz.state.degree.err}</p>
                                    </div>

                                </div>

                                <div className={style.postItem}>

                                    <div className={style.titleCon}>

                                        <span>专业:</span>
                                    </div>
                                    <div className={style.contentCon}>
                                        <Input value={thiz.state.major.value} ckey = "major" style={ctyle} handle={thiz.handleValue}/>
                                    </div>
                                </div>

                                <div className={style.postItem}>
                                    <div className={style.titleCon}>

                                        <span>院校:</span>

                                    </div>
                                    <div className={style.contentCon}>
                                        <CheckBoxGroup ctype="checkbox" handle={this.handleSchoolLevel}
                                                       para={this.state.school_level}/>
                                    </div>
                                </div>

                                <div className={style.secondPostItemHead}>
                                    工作需求
                                </div>

                                <div className={style.postItem}>
                                    <div className={style.titleCon}>
                                        <span>工作年限<span style={{'color':'red'}}>*</span>:</span>

                                    </div>
                                    <div className={style.contentCon}>
                                        <Select child={work_year}
                                                value={thiz.state.work_year.value} ckey='work_year' style={ctyle} handle={thiz.handleValue}/>
                                        <p className={style.errMs} style={thiz.getErrShow('work_year')}>{thiz.state.work_year.err}</p>
                                    </div>
                                </div>

                                <div className={style.postItem}>
                                    <div className={style.titleCon}>

                                        <span>工作背景:</span>

                                    </div>
                                    <div className={style.contentCon}>
                                        <CheckBoxGroup ctype="checkbox" handle={this.handleWorkBack}
                                                       para={this.state.work_back}/>
                                    </div>
                                </div>
                                <div className={style.secondPostItemHead}>
                                    个人需求
                                </div>

                                <div className={style.postItem}>
                                    <div className={style.titleCon}>

                                        <span>性别:</span>

                                    </div>
                                    <div className={style.contentCon}>
                                        <Select child={['不限','男','女']}
                                                value={thiz.state.male.value} ckey='male' style={ctyle} handle={thiz.handleValue}/>
                                    </div>
                                </div>

                                <div className={style.postItem}>

                                    <div className={style.titleCon}>
                                        <span>年龄:</span>
                                    </div>
                                    <div className={style.contentCon}>
                                        <AgeSelect
                                            value={thiz.state.age.value} ckey = "age" style={salaryStyle} handle={thiz.handleValue}/>
                                        <p className={style.errMs} style={thiz.getErrShow('age')}>{thiz.state.age.err}</p>
                                    </div>


                                </div>

                                <div className={style.postItem}>
                                    <div className={style.titleCon}>


                                        <span>语言:</span>
                                    </div>
                                    <div className={style.contentCon}>
                                        <Select child={language_list}
                                                value={thiz.state.language.value} ckey='language' style={ctyle} handle={thiz.handleValue}/>
                                    </div>
                                </div>
                                <div className={style.secondPostItemHead}>
                                    其他需求
                                </div>
                                <div className={style.postItem}>

                                    <div className={style.titleCon} style={{verticalAlign:"top"}}>

                                        <span>其他需求:</span>
                                    </div>
                                    <div className={style.contentCon} style={{height: ""}}>
                                        <textarea value={this.state.other.value}  onChange={thiz.handleTextArea.bind(thiz,"other")}
                                                  className={style.posDescript} ></textarea>
                                    </div>
                                </div>
                                <div className={style.postItem} style={{textAlign:'center'}}>

                                    <div className={style.titleCon} style={{verticalAlign:"top"}}>

                                    </div>
                                    <div className={style.contentCon}>

                                        <input value="上一步" type="button" className={style.backBtn} onClick={()=>{window.history.go(-1)}}/>

                                        <input value="下一步 确认发布" type="button" className={style.nextBtn} onClick={this.nextClick.bind(this)}/>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
export default withRouter(Step2);
