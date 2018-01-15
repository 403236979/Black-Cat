import React, {Component} from 'react';
import { Router, Route, Redirect, IndexRoute, Switch } from 'react-router';
import { BrowserRouter } from 'react-router-dom'
import Home from '../Component/common/home/Index.jsx';
import LoginPage from '../Component/common/login/loginPage/Index.jsx';
import RestPassword from '../Component/common/login/restPassword/Index.jsx';
import ForgotPassword from '../Component/common/login/forgotPassword/Index.jsx';
import Signup from '../Component/common/login/signup/signupPage/Index.jsx';
import FinishSignup from '../Component/common/login/signup/finishSignup/Index.jsx';
import TaskManagement from '../Component/common/guide/taskManagement/Index.jsx';
import Personal from '../Component/common/guide/Personal/Index.jsx';
import Talent from '../Component/common/guide/Talent/Index.jsx';
import Talenthub from '../Component/common/guide/Talenthub/Index.jsx';
import Myteam from '../Component/common/guide/Myteam/Index.jsx';

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
                  <Route path="/guide/taskManagement" component={TaskManagement} />
                  <Route path="/guide/myteam" component={Myteam} />
                  <Route path="/guide/personal" component={Personal} />
                  <Route path="/guide/talent" component={Talent} />
                  <Route path="/guide/talenthub" component={Talenthub} />
                  <Redirect to="/guide/taskManagement" component={TaskManagement} />
              </Switch>
          </Route>
      </Switch>
   </BrowserRouter>
);
export default RouteConfig
