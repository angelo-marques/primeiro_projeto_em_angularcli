import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomeComponent } from './pages/home/home.component';
import { EmpresaComponent } from './pages/empresa/empresa.component';
import { ServicosComponent } from './pages/servicos/servicos.component';
import { ContatoComponent } from './pages/contato/contato.component';
import { BeneficiosComponent } from './pages/beneficios/beneficios.component';
import { CursosEventosComponent } from './pages/cursos-eventos/cursos-eventos.component';
import { AssocieSeComponent } from './pages/associe-se/associe-se.component';
import { VideosComponent } from './pages/videos/videos.component';
import { PresidenteComponent } from './pages/presidente/presidente.component';
import { ParceirosComponent } from './pages/parceiros/parceiros.component';
import { DivaComponent } from './pages/diva/diva.component';
import { NoticiasComponent } from './pages/noticias/noticias.component';
import { CurriculoComponent } from './pages/curriculo/curriculo.component';

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    EmpresaComponent,
    ServicosComponent,
    ContatoComponent,
    BeneficiosComponent,
    CursosEventosComponent,
    AssocieSeComponent,
    VideosComponent,
    PresidenteComponent,
    ParceirosComponent,
    DivaComponent,
    NoticiasComponent,
    CurriculoComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
