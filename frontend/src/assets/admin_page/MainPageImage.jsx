export default function MainPageImage(){
  const leftPlateStyle = 'platestyle2';
  const leftRedPlate = { float: 'right', marginRight: '15px' };
  const leftFloat = { float: 'right' };
  const leftLatchStyle = { float: 'right', left: 0 };

  const rightPlateStyle = 'platestyle';
  const rightRedPlate = { marginLeft: '15px' };
  const rightFloat = {};
  const rightLatchStyle = {};

  return (
    <div className="image">
      <div className="bars_box" style={{ flexDirection: 'row-reverse' }}>
        <div className={`red25 ${leftPlateStyle}`} style={leftRedPlate}></div>
        <div className={`blue20 ${leftPlateStyle}`} style={leftFloat}></div>
        <div className={`yellow15 ${leftPlateStyle}`} style={leftFloat}></div>
        <div className={`green10 ${leftPlateStyle}`} style={leftFloat}></div>
        <div className={`red5kg ${leftPlateStyle}`} style={leftFloat}></div>
        <div className={`yellow25kg ${leftPlateStyle}`} style={leftFloat}></div>
        <div className={`green125kg ${leftPlateStyle}`} style={leftFloat}></div>

        <div style={leftFloat}>
          <div className="grip" style={leftFloat}></div>
          <div className="cylinder" style={leftFloat}></div>
          <div className="rabbet" style={leftFloat}></div>
          <div className="cylinder_2" style={leftFloat}></div>
          <div className="end" style={leftFloat}>
            <div className="cutout-top" style={leftFloat}></div>
            <div className="latch" style={leftLatchStyle}></div>
            <div className="cutout-bottom" style={leftFloat}></div>
          </div>
        </div>
      </div>

      <div className="central"></div>

      <div className="bars_box">
        <div className={`red25 ${rightPlateStyle}`} style={rightRedPlate}></div>
        <div className={`blue20 ${rightPlateStyle}`} style={rightFloat}></div>
        <div className={`yellow15 ${rightPlateStyle}`} style={rightFloat}></div>
        <div className={`green10 ${rightPlateStyle}`} style={rightFloat}></div>
        <div className={`red5kg ${rightPlateStyle}`} style={rightFloat}></div>
        <div className={`yellow25kg ${rightPlateStyle}`} style={rightFloat}></div>
        <div className={`green125kg ${rightPlateStyle}`} style={rightFloat}></div>

        <div style={rightFloat}>
          <div className="grip" style={rightFloat}></div>
          <div className="cylinder" style={rightFloat}></div>
          <div className="rabbet" style={rightFloat}></div>
          <div className="cylinder_2" style={rightFloat}></div>
          <div className="end" style={rightFloat}>
            <div className="cutout-top" style={rightFloat}></div>
            <div className="latch" style={rightLatchStyle}></div>
            <div className="cutout-bottom" style={rightFloat}></div>
          </div>
        </div>
      </div>
    </div>
  );
}