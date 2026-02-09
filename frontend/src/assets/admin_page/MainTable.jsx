import { TableHeader } from './mainTable/TableHeader';

export function MainTable({ lang, competitionName }) {
  return (
    <form method="POST" id="formElem">
      <table id="table" className="main_table" data-listenerset="false">
        <TableHeader
          lang = {lang}
          competitionName = {competitionName}
        />
        <tbody id="table_body">
{/*        <InputRow />*/}
        </tbody>
      </table>
      <input type="submit" hidden></input>
    </form>
  );
}