
const authCheck = () => {
  let check = false;
  let accessToken = localStorage.getItem('accessToken');
  if (! accessToken) {
    sessionStorage.removeItem('User');
    location.assign('/login');
    return false;
  }
  try {
    let decoded = jwt_decode(accessToken);
    check = true;
    sessionStorage.setItem('User', JSON.stringify({
      uid: decoded.uid,
      uemail: decoded.uemail
    }));
  } catch(err) {
    check = false;
    localStorage.removeItem('accessToken');
    sessionStorage.removeItem('User');
    if (!sessionStorage.getItem('Msg')) {
      sessionStorage.setItem('Msg', 'Authentication required.');
    }
    location.assign('/login');
  };
  return check;
};

const getSessionUser = () => {
  let user = JSON.parse(sessionStorage.getItem('User'));
  if (!user) return null;
  return user;
};

const getAuthHeader = () => {
  return 'Bearer '+ localStorage.getItem('accessToken');
};

/**
 *  Sanitize string for html output.
 */
const escHtml = (str) => {
  let lt = /</g, 
      gt = />/g, 
      ap = /'/g, 
      ic = /"/g;
  return (str.toString()
    .replace(lt, "&lt;")
    .replace(gt, "&gt;")
    .replace(ap, "&#39;")
    .replace(ic, "&#34;")
  );
};