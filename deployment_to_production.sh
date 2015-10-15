#!/bin/bash
# deploy to production
curl -X POST --data-urlencode 'payload={"text": "【START】production環境へのデプロイを開始しました。"}' ${SLACK_WEBHOOK_URL}
curl -X POST --data-urlencode 'payload={"text": "【 END 】production環境へのデプロイを完了しました。"}' ${SLACK_WEBHOOK_URL}
