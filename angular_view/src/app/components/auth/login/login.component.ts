import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/services/auth.service';
import { Router }  from '@angular/router';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  constructor(private authService:AuthService, public router:Router) { }

  ngOnInit(): void {
  }

  onLogin(form){
  	this.authService.login(form).subscribe((data)=>{
  		//this.router.navigate(['dashboard']);
  		localStorage.setItem('data-user',JSON.parse(data[0]));
  		console.log(data);
  	})
  }

}
