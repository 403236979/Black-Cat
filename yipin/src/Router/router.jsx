import React, {Component} from 'react';
import { Router, Route, Redirect, IndexRoute, Switch } from 'react-router';
import { BrowserRouter } from 'react-router-dom'
import Home from '../Component/common/home/Index.jsx';
import LoginPage from '../Component/common/login/loginPage/Index.jsx';
import RestPassword from '../Component/common/login/restPassword/Index.jsx';
import ForgotPassword from '../Component/common/login/forgotPassword/Index.jsx';
import Signup from '../Component/common/login/signup/signupPage/Index.jsx';
import FinishSignup from '../Component/common/login/signup/finishSignup/Index.jsx';
import taskManagement from '../Component/common/guide/taskManagement/Index.jsx';

const RouteConfig =(
  <BrowserRouter basename="/">
      <Switch>
          <Route exact path='/' component={Home}/>
          <Route path='/login'>
              <Switch>
                  <Route path="/login/loginPage" component={LoginPage} />
                  <Route path="/login/forgotPassword" component={ForgotPassword} />
                  <Route path="/login/restPassword" component={RestPassword} />
                  <Route path="/login/signup">
                      <Switch>
                          <Route path="/login/signup/finishSignup" component={FinishSignup} />
                          <Route path="/login/signup/signupPage" component={Signup} />
                          <Redirect to="/login/signup/signupPage" component={Signup} />
                      </Switch>
                  </Route>
                  <Redirect to="/login/loginPage" component={LoginPage} />
              </Switch>
          </Route>
          <Route path='/guide'>
              <Switch>
                  <Route path="/guide/taskManagement" component={taskManagement} />
                  <Redirect to="/guide/taskManagement" component={taskManagement} />
              </Switch>
          </Route>
      </Switch>
   </BrowserRouter>
);
export default RouteConfig
