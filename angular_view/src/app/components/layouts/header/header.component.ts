import { Component, OnInit } from '@angular/core';
declare var $:any;

@Component({
  selector: 'ng-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
	estado:boolean = false;

  constructor() { }

  ngOnInit(): void {
  }

  menu(){
  	if(this.estado){
  		$('nav ul').css({'transform': 'translateX(-100%)'});
  		$('.menu').addClass('estado-menu');
  		this.estado = false;
  	}else{
  		$('nav ul').css({'transform': 'translateX(0%)'});
  		
  		$('.menu').removeClass('estado-menu');
  		this.estado = true;
  	}
  }

}
