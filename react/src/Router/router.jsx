import React, {Component} from 'react';
import { Router, Route, Redirect, IndexRoute } from 'react-router';
import { HashRouter, BrowserRouter, Switch } from 'react-router-dom'
import Home from '../Component/common/home/Index.jsx';

const RouteConfig =(
  <BrowserRouter>
      <Switch>
        <Route path='/' component={Home}/>
      </Switch>
   </BrowserRouter>
);
export default RouteConfig
