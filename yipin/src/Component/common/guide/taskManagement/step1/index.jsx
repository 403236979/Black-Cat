import React, {Component} from 'react';
import style from './Step1.css'
import { Link , withRouter } from 'react-router-dom'
import LeftNav from "pubCom/leftNav/index.jsx"
import GuideHeader from "pubCom/guideHeader/index.jsx"
import Input from "pubCom/input/input.jsx"
import {checkTelePhone } from 'pubConf/Comstr.jsx'


class Step1 extends Component {
    constructor(props) {
        super(props);
        this.state = {
            showIndex:0,
            contact:{value:"",title:"联系人姓名",placeholder:"请输入联系人姓名",must:true,err:"",temp_err:"请输入联系人姓名"},
            phone:{value:"",title:"手机号",placeholder:"请输入手机号",must:true,err:"",temp_err:"请输入手机号"},
            email:{value:"",title:"邮箱:",placeholder:"请输入邮箱",must:false,err:"",temp_err:"请输入邮箱"},
            job:{value:"",title:"岗位名称",placeholder:"请输入岗位名称",must:true,err:"",temp_err:"请输入岗位名称"},

        }
    }


    getErrShow = (key)=>{

        if (this.state[key].err){

            return {display:'block'}
        }

        return {display:'none'}
    }

    nextClick = (e)=>{

        e.stopPropagation();


        /*开始检查参数*/

        var _state = {...this.state};

        var flag = false;
        for (var key in _state){
            if (_state[key].must && _state[key].must == true){

                if (!_state[key].value){

                    _state[key].err = _state[key].temp_err;
                    flag = true;
                }
            }
        }

        if (flag) {

            this.setState(_state);
            return;

        }

        /*检查手机和邮箱,地址*/
        if (this.state.phone.value && checkTelePhone(this.state.phone.value) != true){

            this.state.phone.err = '手机格式错误';
            flag = true;
        }


        if (flag) {

            this.setState(_state);
            return;

        }


        var reg2 = /^[a-zA-Z\u4e00-\u9fa5]{1,10}$/;

        if (!reg2.test(_state.contact.value)){

            _state.contact.err = "只能中文或者英文，且10个字符内";
            flag = true;
        }


        var reg3 = /^[a-zA-Z\u4e00-\u9fa5]{1,10}$/;

        if (!reg3.test(_state.job.value)){

            _state.job.err = "只能中文或者英文，且10个字符内";
            flag = true;
        }


        if (flag) {

            this.setState(_state);
            return;

        }

        /*检查参数结束*/

        var para = {


            contact:this.state.contact.value,
            phone:this.state.phone.value,
            email:this.state.email.value,
            position:this.state.job.value,
        }

        var add_para = {

            contact:this.state.contact.value,
            phone:this.state.phone.value,
            email:this.state.email.value,
            position:this.state.job.value,
            company:this.state.contact_company
        }

        this.props.history.push('/guide/taskManagement/step2')

    }

    handleValue = (val,key)=>{

        var _state = {...this.state};

        _state[key].value = val;
        _state[key].err = "";

        this.setState(_state);
    }

    render() {
        var inputStyle = {background:"#ffffff",border:"1px solid rgba(0,0,0,0.12)",borderRadius:"2px",width:"325px",height:"36px"};
        var thiz = this
        return (
            <div id='Test'>
                <GuideHeader/>
                <div className={style.box}>
                    <LeftNav {...this.props} {...this.state}/>
                    <div className={style.contentBox}>
                        <div className={style.bar}>
                            <p style={{color: 'rgb(15, 157, 88)',fontWeight: 'bold'}}>
                                填写联系人信息
                                <b></b>
                            </p>
                            <p>填写职位需求<b></b></p>
                            <p>确认发布<b></b></p>
                            <div className={style.barSolid}/>
                        </div>
                        <div style={{background: 'rgb(255, 255, 255)'}}>
                            <div className={style.conLeft}>
                                <div className={style.header}>
                                    <span className={style.headerTitle}>填写项目联系人信息</span>
                                </div>
                                <div className={style.firstContentCon}>

                                {
                                    ['contact','phone','email','job'].map(function(key,index){
                                        if(key=="email"){
                                            return(
                                                <div className={style.postItem} key={'cat'+index}>
                                                    <div className={style.titleCon}>
                                                        <span>{thiz.state[key].title}</span>
                                                    </div>
                                                    <div className={style.contentCon}>
                                                        <Input value={thiz.state[key].value} placeholder={thiz.state[key].placeholder} style={{border:"1px solid rgba(0,0,0,0.12)",width:"100%",height:"100%"}} ckey={key} handle={thiz.handleValue}/>
                                                    </div>

                                                </div>
                                            )
                                        }else{
                                            return(

                                                <div className={style.postItem} key={'cat'+index}>
                                                    <div className={style.titleCon}>
                                                        <span>{thiz.state[key].title}</span>
                                                        <span style={thiz.state[key].must==true?{'color':'red'}:{display:'none'}}>*</span>
                                                        <span>:</span>
                                                    </div>
                                                    <div className={style.contentCon}>
                                                        <Input value={thiz.state[key].value} placeholder={thiz.state[key].placeholder} style={{border:"1px solid rgba(0,0,0,0.12)",width:"100%",height:"100%"}} ckey={key} handle={thiz.handleValue}/>
                                                        <p className={style.loginErrMsg} style={thiz.getErrShow(key)}>{thiz.state[key].err}</p>
                                                    </div>

                                                </div>
                                            )
                                        }
                                    })


                                }
                            </div>
                                <div className={style.firtConBtnDiv}>

                                    <input value="下一页" className={style.submitBtn} type="button" onClick={this.nextClick.bind(this)}/>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
        )
    }
}
export default withRouter(Step1);
