/*

name：tab导航名。div内容
* <TabsControl>
 <div name="111">
 1111
 </div>
 <div name="222">
 2222
 </div>
 <div name="333">
 3333
 </div>

 </TabsControl>


 */

import React from "react"
import style from "./tabControl.css"

class TabControl extends React.Component{
    constructor(props){
        super(props);

        var style=this.props.style?{...props.style}:{}

        this.state = {
            currentIndex : 0,
            style:style
        }
    }

    check_title_index( index ){

        var ret = {};

        if (index === this.state.currentIndex){

            ret = {color:"#0f9d58",borderBottom:"3px solid #0f9d58"}

        }

        if (this.state.style.height){

            ret.lineHeight = this.state.style.height;
        }

        if (this.state.style.titleWidth){

            ret.width = this.state.style.titleWidth
        }

        return ret
    }

    check_item_index( index ){
        return index === this.state.currentIndex ? {display:"block"} : {display:"none"}
    }


    tabNavClick = (index)=>{
        this.setState({ currentIndex : index })
        this.props.handle? this.props.handle(index):''
    }

    render(  ){
        let _this = this
        return(
            <div>
                { /* 动态生成Tab导航 */ }
                <div className={style.tab_title_wrap} style={this.state.style}>
                    {
                        React.Children.map( this.props.children , ( element,index ) => {

                            return(
                                <div onClick={ (  ) => { _this.tabNavClick(index) } }
                                     className={style.tab_title} style = {this.check_title_index(index)}>{ element.props.name }</div>
                            )
                        })
                    }
                </div>
                { /* Tab内容区域 */ }
                <div className="tab_item_wrap">
                    {
                        React.Children.map(this.props.children,( element,index )=>{

                            if (index == this.state.currentIndex)
                                return(
                                    <div >{ element }</div>
                                )
                        })
                    }
                </div>
            </div>
        )
    }
}

export default TabControl