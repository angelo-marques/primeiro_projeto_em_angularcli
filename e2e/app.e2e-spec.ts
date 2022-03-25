import { KelyasPage } from './app.po';

describe('kelyas App', () => {
  let page: KelyasPage;

  beforeEach(() => {
    page = new KelyasPage();
  });

  it('should display message saying app works', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('app works!');
  });
});
