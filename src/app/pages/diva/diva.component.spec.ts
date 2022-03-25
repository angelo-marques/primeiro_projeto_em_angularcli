import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DivaComponent } from './diva.component';

describe('DivaComponent', () => {
  let component: DivaComponent;
  let fixture: ComponentFixture<DivaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DivaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DivaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
