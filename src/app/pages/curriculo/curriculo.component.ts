import {Component, Inject, OnInit, Input } from '@angular/core';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-curriculo',
  templateUrl: './curriculo.component.html',
  styleUrls: ['./curriculo.component.css']
})
export class CurriculoComponent implements OnInit {

  onSubmit(form){
  console.log(form);
  }

  constructor() { }

  ngOnInit() {
  }

}

