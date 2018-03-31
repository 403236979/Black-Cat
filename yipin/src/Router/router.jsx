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
import PersonalTakeList from '../Component/common/guide/personal/PersonalTakeList/Index.jsx';
import PersonalEdit from '../Component/common/guide/personal/personalEdit/Index.jsx';
import Talent from '../Component/common/guide/Talent/Index.jsx';
import Talenthub from '../Component/common/guide/Talenthub/Index.jsx';
import Membership from '../Component/common/guide/myTeam/membership/index.jsx';
import Verify from '../Component/common/verify/Index.jsx';

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
                  <Route path="/guide/myTeam">
                      <switch>
                          <Route path="/guide/myTeam/membership"  component={Membership} />
                      </switch>
                  </Route>
                  <Route path="/guide/personal">
                      <switch>
                          <Route path="/guide/personal/personalTakeList" component={PersonalTakeList} />
                          <Route path="/guide/personal/personalEdit" component={PersonalEdit} />
                      </switch>
                  </Route>
                  <Route path="/guide/talent" component={Talent} />
                  <Route path="/guide/talenthub" component={Talenthub} />
                  <Redirect to="/guide/taskManagement" component={TaskManagement} />
              </Switch>
          </Route>
          <Route path='/verify' component={Verify}/>
      </Switch>
   </BrowserRouter>
);
export default RouteConfig
