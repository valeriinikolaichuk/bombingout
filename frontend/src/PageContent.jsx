import { useEffect, useState } from 'react';
import { MainTable } from './assets/admin_page/MainTable';

const PAGES = {
  mainTable: MainTable,
};

export default function PageContent() {
  const [page, setPage] = useState(null);
  const [competitionName, setCompetitionName] = useState('');

  useEffect(() => {
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
  />;
}