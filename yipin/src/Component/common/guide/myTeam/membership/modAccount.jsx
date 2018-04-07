import React, {Component} from 'react';
import { Link , withRouter } from 'react-router-dom'
import style from './membership.css'


class Talent extends Component {
    constructor(props) {
        super(props);
        this.state = {
            change:true,
            change1:false,
            change2:false,
        }
    }

    btn2Change = (type) =>{
        this.setState({
            change:false,
            change1:false,
            change2:false
        },()=>{
            this.setState({
                [type]:!this.state[type]
            })
        })
    }

    render() {
        let thiz = this
        return (
            <div className={style.leftDiv}>
                <div>
                    <span className={thiz.state.change?style.btn2Check:style.btn2} onClick={thiz.btn2Change.bind(this,'change')}>管理员</span>
                    全部权限，可以创建，修改和删除任务。也可以设置其他人为管理员；
                </div>
                <div>
                    <span className={thiz.state.change1?style.btn2Check:style.btn2} onClick={thiz.btn2Change.bind(this,'change1')}>普通成员</span>
                    普通成员，可以领取团队中的任务，执行任务；
                </div>
                <div>
                    <span className={thiz.state.change2?style.btn2Check:style.btn2} style={{color:'red'}} onClick={thiz.btn2Change.bind(this,'change2')}>从团队中移除</span>
                    被移除的成员，将不能再进入团队，但与他相关的数据不会被删除。
                </div>
            </div>
        )
    }
}
export default withRouter(Talent);
