import { Injectable } from '@angular/core';
import {  HttpClientModule, HttpClient, HttpHeaders } from '@angular/common/http';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
	api:any;

  constructor(public http:HttpClient) {
  	this.api = environment.api;
   }

  login(form){
     	const headers = new HttpHeaders({"Content-type":"application/json"});
  		return this.http.post(this.api+"api/login", form, {headers: headers});
  }
}
