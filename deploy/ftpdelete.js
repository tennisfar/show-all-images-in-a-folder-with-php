const JSFtp = require("jsftp");
const path = require('path');

var ftp = new JSFtp({
  host: process.env.ftp_host,
  port: process.env.port,
  user: process.env.ftp_user,
  pass: process.env.ftp_password
});

ftp.auth(
  ftp.user,
  ftp.pass,
  function (err, data) {
    if (err) {
      console.log("Error is: ", err);
      return;
    }

    removeAllFilesInPublicFolder(ftp);
  }
);

function removeAllFilesInPublicFolder(ftp) {
  walk(ftp, process.env.ftp_remotePath)
    .then((results) => {
      let files = flatten(results)
        .filter(Boolean);

      console.log("About to try deleting ", files.map((file) => file.filepath));

      // Non-empty directories can't be removed, should I remove all files first?
      let deletions = files.map((file) => {
        if (isDirectory(file)) {
          return deleteDirectory(ftp, file);
        } else {
          return deleteFile(ftp, file);
        }
      });

      return Promise.all(deletions);
    }).then((deletionResults) => {
      console.log("Deletion results: ", deletionResults);
      ftp.destroy();
    }).catch((error) => {
      console.log("Error: ", error);
      ftp.destroy();
    })
}

function walk(ftp, directory) {
  return list(ftp, directory)
    .then((files) => {
      if (files.length === 0) {
        return Promise.resolve();
      }

      return Promise.all(files.map((file) => {
        file.filepath = path.join(directory, file.name);

        let promises = [];

        if (isDirectory(file)) {
          promises.push(walk(ftp, path.join(directory, file.name)));
        }
        // Make sure the directory is after the files in the list of promises
        promises.push(Promise.resolve(file));

        return Promise.all(promises);
      }));
    });
}

function deleteDirectory(ftp, directory) {
  return new Promise((resolve, reject) => {
    ftp.raw('rmd', directory.filepath, (error, result) => {
      if (error) {
        return reject(error);
      } else {
        return resolve(result);
      }
    });
  })
}

function deleteFile(ftp, file) {
  return new Promise((resolve, reject) => {
    ftp.raw('dele', file.filepath, (error, result) => {
      if (error) {
        return reject(error);
      } else {
        return resolve(result);
      }
    });
  })
}

function list(ftp, directory) {
  return new Promise((resolve, reject) => {
    ftp.ls(directory, (error, files) => {
      if (error) {
        reject(error);
        return;
      }

      resolve(files);
    });
  });
}

function isDirectory(file) {
  return file.type === 1;
}

const flatten = list => list.reduce(
  (a, b) => a.concat(Array.isArray(b) ? flatten(b) : b), []
);
