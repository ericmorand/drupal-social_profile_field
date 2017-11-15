const nodeYaml = require('node-yaml');

let pkg = require('./package.json');

let data = nodeYaml.readSync('./social_profile_field.info.yml');

data.version = pkg.version;
data.datestamp = Math.ceil((new Date().getTime()) / 1000);

nodeYaml.writeSync('./social_profile_field.info.yml', data);
