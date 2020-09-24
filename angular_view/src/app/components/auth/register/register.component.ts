import { Component, OnInit, Input } from '@angular/core';
import { AuthService } from 'src/app/services/auth.service';
import {TipoDocumento} from '../../../models/tipo-documento';
import {TipoDocumentoService} from '../../../services/tipo-documento.service';
import {Router} from '@angular/router';

@Component({
  selector: 'app-register',
  templateUrl: './register.component.html',
  styleUrls: ['./register.component.css']
})
export class RegisterComponent implements OnInit {
  tipos:any = [];

  constructor(private tiposService:TipoDocumentoService, private authService:AuthService, public router:Router) { }

  ngOnInit(): void {
   this.get_tipos_documentos();
  }

  get_tipos_documentos(){
    this.tiposService.get().subscribe((data)=>{
      this.tipos = data;
    });
  }
  onSubmit(data){
    this.authService.register(data).subscribe((r)=>{
      alert('usuario registrado correctamente');
      this.router.navigate(['/']);
    });
  }

}
