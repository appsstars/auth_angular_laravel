import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LoginComponent } from 'src/app/components/auth/login/login.component';
import { DashboardComponent } from 'src/app/components/app/dashboard/dashboard.component';
import { RegisterComponent } from 'src/app/components/auth/register/register.component';

 
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
