import React, {Component} from 'react';
import { Router, Route, Redirect, IndexRoute } from 'react-router';
import { HashRouter } from 'react-router-dom'
import Home from '../Component/common/home/Index.jsx';
/*=================
   router.jsx 组件
  专门用来管理路由的
==================*/

const RouteConfig =(
  <HashRouter>
      <Route path='/' component={Home}/>
   </HashRouter>
);
export default RouteConfig
