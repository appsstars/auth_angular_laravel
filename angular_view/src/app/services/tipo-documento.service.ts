import { getInterpolationArgsLength } from '@angular/compiler/src/render3/view/util';
import { Injectable } from '@angular/core';
import {TipoDocumento} from '../../app/models/tipo-documento';
import {  HttpClientModule, HttpClient, HttpHeaders } from '@angular/common/http';
import { environment } from 'src/environments/environment';


@Injectable({
  providedIn: 'root'
})
export class TipoDocumentoService {
  api:any;

  
  constructor(public http:HttpClient) {
    this.api = environment.api;
   }
  

  get(){
    const headers = new HttpHeaders({"Content-type":"application/json"});
    return this.http.get(this.api+'api/auth/tipo_documento', {headers:headers} );
  }
  
}
