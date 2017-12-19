import React, {Component} from 'react';
import { Router, Route, Redirect, IndexRoute, Switch } from 'react-router';
import { BrowserRouter } from 'react-router-dom'
import Home from '../Component/common/home/Index.jsx';
import LoginPage from '../Component/common/login/loginPage/Index.jsx';
import RestPassword from '../Component/common/login/restPassword/Index.jsx';
import ForgotPassword from '../Component/common/login/forgotPassword/Index.jsx';
import Signup from '../Component/common/login/signup/Index.jsx';

/*=================
   router.jsx 组件
  专门用来管理路由的
==================*/

const RouteConfig =(
  <BrowserRouter basename="/">
      <Switch>
          <Route exact path='/' component={Home}/>
          <Route path='/login'>
              <Switch>
                  <Route path="/login/loginPage" component={LoginPage} />
                  <Route path="/login/forgotPassword" component={ForgotPassword} />
                  <Route path="/login/restPassword" component={RestPassword} />
                  <Route path="/login/signup" component={Signup} />
                  <Redirect to="/login/loginPage" component={LoginPage} />
              </Switch>
          </Route>
      </Switch>
   </BrowserRouter>
);
export default RouteConfig
