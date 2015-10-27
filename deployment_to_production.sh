#!/bin/bash
# deploy to production
curl -X POST --data-urlencode 'payload={"text": "【START】production環境へのデプロイを開始しました。"}' https://hooks.slack.com/services/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
# heroku run bin/cake migrations migrate
curl -X POST --data-urlencode 'payload={"text": "【 END 】production環境へのデプロイを完了しました。"}' https://hooks.slack.com/services/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