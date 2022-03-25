import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AssocieSeComponent } from './associe-se.component';

describe('AssocieSeComponent', () => {
  let component: AssocieSeComponent;
  let fixture: ComponentFixture<AssocieSeComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AssocieSeComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AssocieSeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
