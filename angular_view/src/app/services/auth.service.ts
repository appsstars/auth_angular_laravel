import { Injectable } from '@angular/core';
import {  HttpClientModule, HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  constructor(public http:HttpClient) { }

  login(form){
     const headers = new HttpHeaders({"Content-type":"application/json"});
    return this.http.post(this.api.url+"api/login", user, {headers: headers});
  }
}
