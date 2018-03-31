/*

* <Table columns = {columns}
 source = {data}
 lineClick = {this.lineClick}
 style={{width:'730px'}}
 >
 </Table>

 */


import React from 'react';
import Checkbox from 'rc-checkbox';


import style from "./table.css";

export default class Table extends React.Component{

    constructor(props){
        super(props);

        var checked = [];
        var allChecked = true;

        if (props.prev) {
            for (var i = 0; i < props.source.length; i++) {

                if (props.source[i].checked == true)
                    checked.push(true);
                else {
                    checked.push(false);
                    allChecked = false;
                }
            }

            if (allChecked == true)
                checked.push(true);/*为了头部的选择*/
            else
                checked.push(false);
            /*为了头部的选择*/
        }

        this.state = {
            style:props.style?props.style:{},
            selected: props.selected || -1,
            checked:checked,

        }

    }

    componentWillReceiveProps(nextProps){


        var checked = [];
        var allChecked = true;


        if (this.props.prev) {
            for (var i = 0; i < nextProps.source.length; i++) {

                if (nextProps.source[i].checked == true)
                    checked.push(true);
                else {
                    checked.push(false);
                    allChecked = false;
                }
            }

            if (allChecked == true)
                checked.push(true);/*为了头部的选择*/
            else
                checked.push(false);
            /*为了头部的选择*/
        }

        this.setState({

            checked:checked,

        })
    }


    clickLine = (para,index,e)=>{

        e.stopPropagation();

        this.setState({

            selected:index
        })

        if (this.props.lineClick){

            this.props.lineClick(para)
        }
    }


    getSelectedLine = (index)=>{



        return index == this.state.selected?{backgroundColor:"#F2F5F8"}:{}



    }

    clickCheck = (index,e)=>{

        e.stopPropagation();


        if (this.props.checkedHandle){

            this.props.checkedHandle(e.target.checked,index)


        }


    }

    calcLength = (s)=>{

        var len = 0;

        for (var i=0; i<s.length; i++) {
            if (s.charCodeAt(i)>127 || s.charCodeAt(i)==94) {
                len += 2;
            } else {
                len ++;
            }
        }
        return len;
    }


    render(){

        const thiz = this;
        //console.log(thiz.state.checked)
        function uuid() {
            return Math.random().toString(36).substring(3,8)
        }

        let srcLen = thiz.props.source.length;


        return(

            <div className={style.container}>

                <table className={style.table} style={this.state.style?this.state.style:{}}>
                    <thead >
                    <tr>
                        {

                            ['b'].map(function(check,index){

                                if (thiz.props.prev){

                                    return <td key={'key'+index} className={style.theadTd}>
                                        <Checkbox  onChange={thiz.clickCheck.bind(thiz,srcLen)} checked={thiz.state.checked[srcLen]}/>
                                    </td>
                                }
                            })
                        }
                        {
                            this.props.columns.map(function(item){

                                return <td key={item.key} className={style.theadTd} >{item.title}</td>
                            })
                        }
                    </tr>
                    </thead>
                    <tbody>

                    {

                        thiz.props.source.map(function (item,index) {

                            var array = [];

                            if (thiz.props.prev){

                                array.push(<td key={'key'+index}><Checkbox type="checkbox"  onChange={thiz.clickCheck.bind(thiz,index)} checked={thiz.state.checked[index]}/></td>)
                            }

                            for (var i =0;i < thiz.props.columns.length;i++){

                                for(var key in item){

                                    if (key == thiz.props.columns[i].key){

                                        var temp = item[key];

                                        if (thiz.props.columns[i].limit && thiz.props.columns[i].limit == true){

                                            if (temp.length> 6){

                                                temp = temp.substring(0,6);
                                                temp = temp+"...";
                                            }
                                        }
                                        if(thiz.props.retentionAnalysis){
                                            if (thiz.props.columns[i].render){

                                                array.push(<td key={uuid()}>{thiz.props.columns[i].render(item[key],index)}</td>)

                                            }else{
                                                if(temp.toString().indexOf('(')!=-1){
                                                    if(temp.toString().replace(/\(.*?\)/g,'')=='0 '){
                                                        array.push(<td key={uuid()} onClick={thiz.clickLine.bind(thiz,item,index)}>{temp}</td>)
                                                    }else{
                                                        array.push(<td className={style.retentionAnalysis} key={uuid()} onClick={thiz.clickLine.bind(thiz,item,index)}>{temp}</td>)
                                                    }
                                                }else{
                                                    array.push(<td key={uuid()} onClick={thiz.clickLine.bind(thiz,item,index)}>{temp}</td>)
                                                }



                                            }
                                        }else{
                                            if (thiz.props.columns[i].render){

                                                array.push(<td key={uuid()} onClick={thiz.clickLine.bind(thiz,item,index)}>{thiz.props.columns[i].render(item[key],index)}</td>)

                                            }else{

                                                array.push(<td key={uuid()} onClick={thiz.clickLine.bind(thiz,item,index)}>{temp}</td>)

                                            }
                                        }

                                    }
                                }
                            }
                            if(thiz.props.retentionAnalysis){
                                return <tr  key={uuid()} >{array}</tr>
                            }else{
                                return <tr className={style.bodyTr} key={uuid()} style={thiz.getSelectedLine(index)}>{array}</tr>
                            }

                        })

                    }

                    </tbody>
                </table>


            </div>
        )

    }

}
