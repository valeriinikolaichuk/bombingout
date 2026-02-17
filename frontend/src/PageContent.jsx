import { useEffect } from 'react';
//import { MainTable } from './assets/admin_page/MainTable';

/*const PAGES = {
  mainTable: MainTable,
};*/

export default function PageContent() {
//  const [page, setPage] = useState(null);
//  const [competitionName, setCompetitionName] = useState('');

  useEffect(() => {
    const reload = () => {
      fetch('/admin/table') // шлях до PHP / Twig, який віддає таблицю
        .then(res => res.text())
        .then(html => {
          const container = document.getElementById('page-root');
          if (container) {
            container.innerHTML = html;

            // Ініціалізація JS таблиці
            if (window.initMainTable) {
              window.initMainTable(); // твій JS для drag & drop, sorting і т.д.
            }
          }
        });
    };


    window.addEventListener('table:reload', reload);

    // cleanup
    return () => window.removeEventListener('table:reload', reload);
  }, []);

  return null; // нічого не рендеримо, бо #page-root вже є в DOM


/*
    const mainTableHandler = (e) => {
      const { competitionName } = e.detail || {};
      if (competitionName) {
        setCompetitionName(competitionName);
      }

      setPage('mainTable');
    };

    window.addEventListener(
      'popup:createCompetition:success', mainTableHandler
    );

    return () =>
      window.removeEventListener(
        'popup:createCompetition:success', mainTableHandler
    );
  }, []);

  if (!page) return null;

  const PageComponent = PAGES[page];
  if (!PageComponent) return null;

  return <PageComponent 
    lang = {window.appData.lang} 
    competitionName = {competitionName}
  />;*/
}