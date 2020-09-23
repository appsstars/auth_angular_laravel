import { Injectable } from '@angular/core';
declare var $:any;

@Injectable({
  providedIn: 'root'
})
export class LoaderService {

  constructor() { }

  show(){
  	$('.precarga').show();
  }

  hide(){
  	$('.precarga').hide();
  }
}
