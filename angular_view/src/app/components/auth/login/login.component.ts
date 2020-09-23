import { Component, OnInit } from '@angular/core';
import { AuthService } from 'src/app/services/auth.service';
import { Router }  from '@angular/router';
import { LoaderService } from 'src/app/services/loader.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {

  constructor(private authService:AuthService, public router:Router, public loaderService:LoaderService) { }

  ngOnInit(): void {
  }

  onLogin(form){
    this.loaderService.show();
  	this.authService.login(form).subscribe((data)=>{
  		localStorage.setItem('data-user',JSON.stringify(data));
      this.loaderService.hide();
      this.router.navigate(['/app/dashboard']);
  	})
  }

}
