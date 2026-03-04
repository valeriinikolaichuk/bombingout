import { useState, useEffect, useRef } from "react";
import { openPopupText as t } from "./popups/i18n/openPopupText";
import { db } from "../../../assets/db";

export default function OpenCompetition({ mode, lang, onClose }){
  const dialogRef = useRef(null);
  const [competitions, setCompetitions] = useState([]);

  useEffect(() => {
    dialogRef.current?.showModal();
    return () => dialogRef.current?.close();
  }, []);

  useEffect(() => {
    async function loadCompetitions() {
      const list = await db.competitions.orderBy("comp_id").toArray();
      setCompetitions(list);
    }

    loadCompetitions();
  }, []);

  return (
    <dialog id="open-dialog" ref={dialogRef}>
      <div>
        <div id="closeXOpenDialog" className="btn-close" onClick={onClose}>&times;</div>
        <h3 style={{ textAlign: "center" }}>{t.title[mode][lang]}</h3>
        <div id="open">
          <div id="left_open">
            <div id="open-list" data-type="listeners_off">

              <form>
                <button type="submit" className="btn-block" style={{ border: 0 }}></button>
              </form>

              {competitions.length > 0 && competitions.map((comp) => (
                <form id={`buttonOn${comp.comp_id}`} key={comp.comp_id}>
                  <button type="button" className="btn-block" id={`xbuttonOn${comp.comp_id}`}>
                    {comp.competition_name}
                  </button>
                </form>
              ))}

            </div>
          </div>

          <div id="right_open">

            <table className="popupTable" style={{ margin: "auto" }}>
              <tbody>
                <tr>
                  <td>
                    <div id="btnOpen">
                      <button className="buttonstyle_2" type="button">{t.buttons.open[lang]}</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div id="btnChange">
                      <button className="buttonstyle_2" type="button">{t.buttons.change[lang]}</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div id="btnNomination">
                      <button className="buttonstyle_2" type="button">{t.buttons.nomination[lang]}</button>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div id="buttonDel">
                      <form method="POST" id="btnDelete">
                        <button className="buttonstyle_2" type="button">{t.buttons.delete[lang]}</button>
                      </form>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>

            <table className="popupTable" style={{ margin: "auto" }}>
              <tbody>
                <tr>
                  <td id="width_2" className="popupTable" style={{ whiteSpace: "pre", textAlign: "center",}}></td>
                </tr>
              </tbody>
            </table>

            <table className="popupTable" style={{ margin: "auto" }}>
              <tbody>
                <tr>
                  <td>
                    <button id="closeOpenDialog" className="buttonstyle_2" type="button" 
                      onClick={onClose}>{t.buttons.cancel[lang]}</button>
                  </td>
                </tr>
              </tbody>
            </table>

          </div>

          <div id="empty"></div>
        </div>
      </div>
    </dialog>
  );
}