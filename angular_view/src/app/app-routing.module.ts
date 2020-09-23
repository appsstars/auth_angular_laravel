import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LoginComponent } from 'src/app/components/auth/login/login.component';
import { DashboardComponent } from 'src/app/components/app/dashboard/dashboard.component';
<<<<<<< HEAD
import { RegisterComponent } from 'src/app/components/auth/register/register.component';
=======
import { RegisterComponent } from './components/auth/register/register.component';
>>>>>>> f363c411aca12172c687bb58ad68ae0b1d7cf763
 
const routes: Routes = [
	{path:'', redirectTo:'login',pathMatch:'full'},
	{path:'',component:LoginComponent},
	{path:'register',component:RegisterComponent},
	{path:'app/dashboard',component:DashboardComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
