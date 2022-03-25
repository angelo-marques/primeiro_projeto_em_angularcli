import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { HomeComponent } from './pages/home/home.component';
import { EmpresaComponent } from './pages/empresa/empresa.component';
import { BeneficiosComponent } from './pages/beneficios/beneficios.component';
import { ContatoComponent } from './pages/contato/contato.component';
import { CursosEventosComponent } from './pages/cursos-eventos/cursos-eventos.component';
import { AssocieSeComponent } from './pages/associe-se/associe-se.component';
import { VideosComponent } from './pages/videos/videos.component';
import { PresidenteComponent } from './pages/presidente/presidente.component';
import { ParceirosComponent } from './pages/parceiros/parceiros.component';
import { DivaComponent } from './pages/diva/diva.component';
import { NoticiasComponent } from './pages/noticias/noticias.component';
import { CurriculoComponent } from './pages/curriculo/curriculo.component';


const routes: Routes = [
  { path: '', component: HomeComponent},
  { path: 'empresa', component: EmpresaComponent },
  { path: 'beneficios', component: BeneficiosComponent },
  { path: 'cursosEventos', component: CursosEventosComponent },
  { path: 'parceiros', component: ParceirosComponent },
  { path: 'videos', component: VideosComponent },
  { path: 'sejaAssociado', component: AssocieSeComponent },
  { path: 'diva', component: DivaComponent },
  { path: 'presidente', component: PresidenteComponent },
  { path: 'noticias', component: NoticiasComponent },
  { path: 'curriculo', component: CurriculoComponent },
  { path: 'contato', component: ContatoComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes, {useHash: true})],
  exports: [RouterModule]
})
export class AppRoutingModule { }

