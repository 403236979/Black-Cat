import React, {Component} from 'react';
import style from './changeTeam.css'

export default class OutBtn extends Component {
    constructor(props) {
        super(props);
        this.state = {
            btnShow:false
        }
    }

    show = ()=>{
        this.setState({
            btnShow:!this.state.btnShow
        })
    }

    render() {
        let thiz = this
        return (
            <div className={style.btn} onMouseEnter={thiz.show.bind(this)} onMouseLeave={thiz.show.bind(this)}>
                …
                <div className={style.outBtn} style={thiz.state.btnShow?{display:'block'}:{display:'none'}}>
                    <ul>
                        <li>修改名称</li>
                        <li>移交团队</li>
                        <li>删除团队</li>
                    </ul>
                </div>
            </div>
        )
    }
}
