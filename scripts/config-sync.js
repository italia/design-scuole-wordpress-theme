const replace = require('replace-in-file')

const readmePath = 'README.md'
const cssPath = 'style.css'
// package.json is updated by `npm version major/minor/patch` or similar
const version = require('../package.json').version

const configReadmeOptions = {
  files: readmePath,
  from: /### I primi passi con il tema Wordpress \(.+\)/gi,
  to: `### I primi passi con il tema Wordpress (${version})`,
}

const configCssOptions = {
  files: cssPath,
  from: /Version:.+/gi,
  to: `Version: ${version}`,
}

const replaceInFile = (config) => {
  return replace.sync(config).map((el) => el.file)
}

try {
  let changedFiles = replaceInFile(configReadmeOptions)
  changedFiles = changedFiles.concat(replaceInFile(configCssOptions))
  console.info('Modified files:', changedFiles.join(', '))
} catch (error) {
  console.error(e)
  process.exit(1)
}
