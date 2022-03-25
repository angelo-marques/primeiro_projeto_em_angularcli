import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CursosEventosComponent } from './cursos-eventos.component';

describe('CursosEventosComponent', () => {
  let component: CursosEventosComponent;
  let fixture: ComponentFixture<CursosEventosComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CursosEventosComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CursosEventosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
