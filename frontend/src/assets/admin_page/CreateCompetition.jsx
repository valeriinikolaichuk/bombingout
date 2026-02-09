import { useState, useEffect, useRef } from "react";
import { competitionText as t } from "./popups/i18n/competitionText";
import Select from './popups/config/Select';
import { divisions, sexes, ageGroups, types, versions } from './popups/config/competitionOptions';
import { createFormSubmit } from "./popups/createFormSubmit";

export default function CreateCompetition({ mode, lang, onClose }) {
  const [competitionName, setCompetitionName] = useState('');
  const [country, setCountry] = useState('');
  const [city, setCity] = useState('');

  const today = new Date().toISOString().slice(0, 10);

  const [startDate, setStartDate] = useState(today);
  const [endDate, setEndDate] = useState(today);

  useEffect(() => {
    if (startDate > endDate) {
      setEndDate(startDate);
    }
  }, [startDate]);

  useEffect(() => {
    if (endDate < startDate) {
      setEndDate(startDate);
    }
  }, [endDate]);

  const [division, setDivision] = useState('');

  const defaultSex = sexes[0].value;
  const defaultAgeGroup = ageGroups.find(g => g.sex === defaultSex)?.value || '';

  const [sex, setSex] = useState(defaultSex);
  const [ageGroup, setAgeGroup] = useState(defaultAgeGroup);

  const filteredAgeGroups = sex
  ? ageGroups.filter(g => g.sex === sex)
  : [];

  const [type, setType] = useState('');
  const [version, setVersion] = useState('');

  const dialogRef = useRef(null);

  useEffect(() => {
    dialogRef.current?.showModal();
    return () => dialogRef.current?.close();
  }, []);

  return (
    <dialog id="create-dialog" className="create-dialog" ref={dialogRef}>
      <div>
        <div id="btnClose"  className="btn-close" onClick={onClose}>&times;</div>
        <div>
          <h3 style={{ textAlign: 'center' }}>{t.titles[mode][lang]}</h3>
        </div>

        <form id="formCreate" method="POST">
          <table className="popupTable">
            <tbody>
              <tr className="popupTable">
                <td className="popupTable">{t.fields.name[lang]}</td>
              </tr>
              <tr className="popupTable">
                <td className="popupTable">
                  <input 
                    className="competition_name" 
                    type="text" 
                    name="competition_name"
                    value={competitionName}
                    onChange = {
                      e => setCompetitionName(e.target.value)
                    }
                  />
                </td>
              </tr>
            </tbody>
          </table>

          <table className="popupTable">
            <tbody>
              <tr className="popupTable">
                <td className="popupTable width_1">{t.fields.country[lang]}</td>
                <td className="popupTable width_1">{t.fields.city[lang]}</td>
                <td className="popupTable width_1">{t.fields.startDate[lang]}</td>
                <td className="popupTable width_1">{t.fields.endDate[lang]}</td>
              </tr>

              <tr className="popupTable">
                <td className="popupTable">
                  <input 
                    className="width_1" 
                    type="text" 
                    name="country" 
                    value={country} 
                    onChange = {
                      e => setCountry(e.target.value)
                    }
                  />
                </td>
                <td className="popupTable">
                  <input 
                    className="width_1" 
                    type="text" 
                    name="city" 
                    value={city} 
                    onChange = {
                      e => setCity(e.target.value)
                    }
                  />
                </td>
                <td className="popupTable">
                  <input
                    type="date"
                    name="start_date"
                    value={startDate}
                    onChange={e => setStartDate(e.target.value)}
                  />
                </td>
                <td className="popupTable">
                  <input
                    type="date"
                    name="end_date"
                    value={endDate}
                    onChange={e => setEndDate(e.target.value)}
                  />
                </td>
              </tr>
            </tbody>
          </table>

          <table className="popupTable">
            <tbody>
              <tr className="popupTable">
                <td className="popupTable width_1">{t.fields.division[lang]}</td>
                <td className="popupTable width_1">{t.fields.sex[lang]}</td>
                <td className="popupTable width_1">{t.fields.ageGroup[lang]}</td>
                <td className="popupTable width_1">{t.fields.type[lang]}</td>
              </tr>

              <tr className="popupTable">
                <td className="popupTable">
                  <Select
                    name="division"
                    value={division}
                    onChange={e => setDivision(e.target.value)}
                    options={divisions}
                    lang={lang}
                  />
                </td>
                <td className="popupTable">
                  <Select
                    name="sex"
                    value={sex}
                    onChange={e => {
                      const newSex = e.target.value; setSex(newSex); 
                      const first = ageGroups.find(g => g.sex === newSex);
                      setAgeGroup(first ? first.value : '');
                    }}

                    options={sexes}
                    lang={lang}
                  />
                </td>
                <td className="popupTable">
                  <Select
                    name="age_group"
                    value={ageGroup}
                    onChange={e => setAgeGroup(e.target.value)}
                    options={filteredAgeGroups}
                    lang={lang}
                  />
                </td>
                <td className="popupTable">
                  <Select
                    name="type"
                    value={type}
                    onChange={e => setType(e.target.value)}
                    options={types}
                    lang={lang}
                  />
                </td>
              </tr>

              <tr className="popupTable">
                <td className="popupTable width_1">{t.fields.version[lang]}</td>
              </tr>
              <tr className="popupTable">
                <td className="popupTable">
                  <Select
                    name="version"
                    value={version}
                    onChange={e => setVersion(e.target.value)}
                    options={versions}
                    lang={lang}
                  />
                </td>
              </tr>
            </tbody>
          </table>

          <div id="inputHidden"></div>

          <div id="button_create" className="button_create">
            <button 
              style={{ marginRight: 5 }} 
              type="button" 
              onClick = {() => {
                createFormSubmit(competitionName, country, city, lang, onClose);
              }}
            >
              {t.buttons.ok[lang]}
            </button>

            <button type="button" onClick={onClose}>{t.buttons.cancel[lang]}</button>
          </div>
        </form>
      </div>
    </dialog>
  );
}